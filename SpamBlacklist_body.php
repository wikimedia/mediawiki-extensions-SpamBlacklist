<?php

if ( defined( 'MEDIAWIKI' ) ) {

class SpamBlacklist {
	var $regex = false;
	var $previousFilter = false;
	var $files = array();
	
	function SpamBlacklist() {
		global $IP;
		$this->files = array( "$IP/extensions/SpamBlacklist/wikimedia_blacklist" );
	}
	function filter( &$title, $text, $section ) {
		global $wgArticle, $wgDBname, $wgMemc, $wgOut;

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
				if ( $wgDBname == $matches[0] && $title->getPrefixedDBkey() == $matches[1] ) {
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
				foreach ( $this->files as $fileName ) {
					if ( preg_match( '/^DB: (\w*) (.*)$/', $fileName, $matches ) ) {
						if ( $wgDBname == $matches[0] && $title->getPrefixedDBkey() == $matches[1] ) {
							$lines += explode( "\n", $text );
						} else {
							$lines += $this->getArticleLines( $matches[0], $matches[1] );
						}
					} else {
						$lines += file( $fileName );
					}
				}

				# Strip comments and whitespace, then remove blanks
				$lines = array_filter( array_map( 'trim', preg_replace( '/#.*$/', '', $lines ) ) );

				# No lines, don't make a regex which will match everything
				if ( count( $lines ) == 0 ) {
					$this->regex = true;
				} else {
					# Make regex
					# It's faster using the S modifier even though it will usually only be run once
					$this->regex = 'http://[a-z0-9\-.]*(' . implode( '|', $lines ) . ')';
					$this->regex = '/' . str_replace( '/', '\/', $this->regex ) . '/Si';
				}
				$wgMemc->set( "spamb_blacklist_regex", $this->regex, 3600 );
			}
		}
		if ( $this->regex !== true ) {
			# Do the match
			if ( preg_match( $this->regex, $text, $matches ) ) {
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
		$res = $dbr->query( "SELECT cur_text FROM metawiki.cur WHERE cur_namespace=0 AND cur_title='Spam_blacklist'" );
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

