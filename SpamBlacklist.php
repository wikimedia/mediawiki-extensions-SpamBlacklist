<?php

# Loader for spam blacklist feature
# Include this from LocalSettings.php

if ( defined( 'MEDIAWIKI' ) ) {

global $wgFilterCallback, $wgPreSpamFilterCallback;
global $wgSpamBlacklistFiles;

$wgSpamBlacklistFiles = false;

if ( $wgFilterCallback ) {
	$wgPreSpamFilterCallback = $wgFilterCallback;
} else {
	$wgPreSpamFilterCallback = false;
}

$wgFilterCallback = 'wfSpamBlacklistLoader';

function wfSpamBlacklistLoader( &$title, $text, $section ) {
	require_once( "SpamBlacklist_body.php" );
	static $spamObj = false;
	global $wgSpamBlacklistFiles, $wgPreSpamFilterCallback;

	if ( $spamObj === false ) {
		$spamObj = new SpamBlacklist;
		if ( $wgSpamBlacklistFiles ) {
			$spamObj->files = $wgSpamBlacklistFiles;
			$spamObj->previousFilter = $wgPreSpamFilterCallback;
		}
	}

	return $spamObj->filter( $title, $text, $section );
}

} # End invocation guard
?>
