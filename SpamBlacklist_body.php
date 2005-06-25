<?php

if ( defined( 'MEDIAWIKI' ) ) {

class SpamBlacklist {
	var $regex = false;
	var $previousFilter = false;
	var $files = array();
	var $warningTime = 600;
	var $expiryTime = 900;
	var $warningChance = 100;
	
	function SpamBlacklist() {
		global $IP;
		$this->files = array( "http://meta.wikimedia.org/wiki/Spam_blacklist?action=raw&sb_ver=1" );
	}
	function filter( &$title, $text, $section ) {
		global $wgArticle, $wgDBname, $wgMemc, $messageMemc, $wgVersion, $wgOut;

		$fname = 'wfSpamBlacklistFilter';
		wfProfileIn( $fname );

		# Call the rest of the hook chain first
		if ( $this->previousFilter ) {
			$f = $this->previousFilter;
			if ( $f( $title, $text, $section ) ) {
				wfProfileOut( $fname );
				return true;
			}
		}

		if ( !is_array( $this->files ) ) {
			$this->files = array( $this->files );
		}
		if ( count( $this->files ) == 0 ){ 
			# No lists
			wfProfileOut( $fname );
			return false;
		}

		# Refresh cache if we are saving the blacklist
		$recache = false;
		foreach ( $this->files as $fileName ) {
			if ( preg_match( '/^DB: (\w*) (.*)$/', $fileName, $matches ) ) {
				if ( $wgDBname == $matches[1] && $title->getPrefixedDBkey() == $matches[2] ) {
					$recache = true;
					break;
				}
			}
		}


		if ( $this->regex === false || $recache ) {
			if ( !$recache ) {
				$this->regex = $wgMemc->get( "spam_blacklist_regex" );
			}
			if ( !$this->regex ) {
				# Load lists
				$lines = array();
				wfDebug( "Constructing spam blacklist\n" );
				foreach ( $this->files as $fileName ) {
					if ( preg_match( '/^DB: (\w*) (.*)$/', $fileName, $matches ) ) {
						if ( $wgDBname == $matches[1] && $title->getPrefixedDBkey() == $matches[2] ) {
							$lines += explode( "\n", $text );
						} else {
							$lines += $this->getArticleLines( $matches[1], $matches[2] );
						}
					} elseif ( preg_match( '/^http:\/\//', $fileName ) ) {
						# HTTP request
						# To keep requests to a minimum, we save results into $messageMemc, which is
						# similar to $wgMemc except almost certain to exist. By default, it is stored
						# in the database
						#
						# There are two keys, when the warning key expires, a random thread will refresh
						# the real key. This reduces the chance of multiple requests under high traffic 
						# conditions.
						$key = "spam_blacklist_file:$fileName";
						$warningKey = "$wgDBname:spamfilewarning:$fileName";
						$httpText = $messageMemc->get( $key );
						$warning = $messageMemc->get( $warningKey );

						if ( !is_string( $httpText ) || ( !$warning && !mt_rand( 0, $this->warningChance ) ) ) {
							wfDebug( "Loading spam blacklist from $fileName\n" );
							$url_fopen = ini_set( 'allow_url_fopen', 1 );
							$httpText = file_get_contents( $fileName );
							ini_set( 'allow_url_fopen', $url_fopen );
							$messageMemc->set( $warningKey, 1, $this->warningTime );
							$messageMemc->set( $key, $httpText, $this->expiryTime );
						}
						
						$lines += explode( "\n", $httpText );
					} else {
						$lines += file( $fileName );
					}
				}

				# Strip comments and whitespace, then remove blanks
				$lines = array_filter( array_map( 'trim', preg_replace( '/#.*$/', '', $lines ) ) );

				# No lines, don't make a regex which will match everything
				if ( count( $lines ) == 0 ) {
					wfDebug( "No lines\n" );
					$this->regex = true;
				} else {
					# Make regex
					# It's faster using the S modifier even though it will usually only be run once
					$this->regex = 'http://[a-z0-9\-.]*(' . implode( '|', $lines ) . ')';
					$this->regex = '/' . str_replace( '/', '\/', preg_replace('|\\\*/|', '/', $this->regex) ) . '/Si';
				}
				$wgMemc->set( "spam_blacklist_regex", $this->regex, 3600 );
			}
		}
		if ( $this->regex !== true ) {
			# Do the match
			wfDebug( "Checking text against regex: {$this->regex}\n" );
			if ( preg_match( $this->regex, $text, $matches ) ) {
				wfDebug( "Match!\n" );
				EditPage::spamPage( $matches[0] );
				$retVal = true;
			} else {
				$retVal = false;
			}
		} else {
			$retVal = false;
		}

		wfProfileOut( $fname );
		return $retVal;
	}

	function getArticleLines( $db, $article ) {
		$dbr = wfGetDB( DB_READ );
		$cur = $dbr->tableName( 'cur' );
		$res = $dbr->query( "SELECT cur_text FROM $db.$cur WHERE cur_namespace=0 AND cur_title='$article'" );
		$row = $dbr->fetchObject( $res );
		if ( $row ) {
			return explode( "\n", $row->cur_text );
		} else {
			return array();
		}
	}
}

	
} # End invocation guard
?>

