<?php

# Loader for spam blacklist feature
# Include this from LocalSettings.php

if ( defined( 'MEDIAWIKI' ) ) {

global $wgFilterCallback, $wgPreSpamFilterCallback;
global $wgSpamBlacklistFiles;
global $wgSpamBlacklistSettings;

$wgSpamBlacklistFiles = false;
$wgSpamBlacklistSettings = array();

if ( $wgFilterCallback ) {
	$wgPreSpamFilterCallback = $wgFilterCallback;
} else {
	$wgPreSpamFilterCallback = false;
}

$wgFilterCallback = 'wfSpamBlacklistLoader';
$wgExtensionCredits['other'][] = array(
	'name' => 'SpamBlacklist',
	'author' => 'Tim Starling',
	'url' => 'http://www.mediawiki.org/wiki/Extension:SpamBlacklist',
	'description' => 'Regex based anti spam tool',
);

$wgExtensionFunctions[] = 'wfSpamBlacklistMessageLoader';

function wfSpamBlacklistMessageLoader() {
	global $wgMessageCache;
	require_once( 'SpamBlacklist.i18n.php' );
	foreach( efSpamBlacklistMessages() as $lang => $messages ) {
		$wgMessageCache->addMessages( $messages, $lang );
	}
}

function wfSpamBlacklistLoader( &$title, $text, $section ) {
	require_once( "SpamBlacklist_body.php" );
	static $spamObj = false;
	global $wgSpamBlacklistFiles, $wgSpamBlacklistSettings, $wgPreSpamFilterCallback;

	if ( $spamObj === false ) {
		$spamObj = new SpamBlacklist( $wgSpamBlacklistSettings );
		if ( $wgSpamBlacklistFiles ) {
			$spamObj->files = $wgSpamBlacklistFiles;
			$spamObj->previousFilter = $wgPreSpamFilterCallback;
		}
	}

	return $spamObj->filter( $title, $text, $section );
}

} # End invocation guard


