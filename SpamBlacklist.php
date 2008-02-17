<?php

# Loader for spam blacklist feature
# Include this from LocalSettings.php

if ( !defined( 'MEDIAWIKI' ) ) {
	exit;
}

$wgExtensionCredits['other'][] = array(
	'name'           => 'SpamBlacklist',
	'author'         => 'Tim Starling',
	'version'        => '2008-02-13',
	'url'            => 'http://www.mediawiki.org/wiki/Extension:SpamBlacklist',
	'description'    => 'Regex-based anti-spam tool',
	'descriptionmsg' => 'spam-blacklist-desc',
);

$dir = dirname(__FILE__) . '/';
$wgExtensionMessagesFiles['SpamBlackList'] = $dir . 'SpamBlacklist.i18n.php';

global $wgFilterCallback, $wgPreSpamFilterCallback;
global $wgSpamBlacklistFiles;
global $wgSpamBlacklistSettings;


$wgSpamBlacklistFiles = false;
$wgSpamBlacklistSettings = array();

$wgPreSpamFilterCallback = false;

if ( defined( 'MW_SUPPORTS_EDITFILTERMERGED' ) ) {
	$wgHooks['EditFilterMerged'][] = 'wfSpamBlacklistFilterMerged';
} else {
	if ( $wgFilterCallback ) {
		$wgPreSpamFilterCallback = $wgFilterCallback;
	}
	$wgFilterCallback = 'wfSpamBlacklistFilter';
}


$wgHooks['EditFilter'][] = 'wfSpamBlacklistValidate';
$wgHooks['ArticleSaveComplete'][] = 'wfSpamBlacklistArticleSave';

/**
 * Internationalization messages
 */
function wfSpamBlacklistLoadMessages() {
	wfLoadExtensionMessages('SpamBlackList');
}

/**
 * Get an instance of SpamBlacklist and do some first-call initialisation.
 * All actual functionality is implemented in that object
 */
function wfSpamBlacklistObject() {
	global $wgSpamBlacklistFiles, $wgSpamBlacklistSettings, $wgPreSpamFilterCallback;
	static $spamObj;
	if ( !$spamObj ) {
		require_once( "SpamBlacklist_body.php" );
		$spamObj = new SpamBlacklist( $wgSpamBlacklistSettings );
		if( $wgSpamBlacklistFiles ) {
			$spamObj->files = $wgSpamBlacklistFiles;
		}
		$spamObj->previousFilter = $wgPreSpamFilterCallback;
		wfSpamBlacklistLoadMessages();
	}
	return $spamObj;
}

/**
 * Hook function for $wgFilterCallback
 */
function wfSpamBlacklistFilter( &$title, $text, $section ) {
	$spamObj = wfSpamBlacklistObject();
	return $spamObj->filter( $title, $text, $section );
}

/**
 * Hook function for EditFilterMerged, replaces wfSpamBlacklistFilter
 */
function wfSpamBlacklistFilterMerged( $editPage, $text ) {
	$spamObj = wfSpamBlacklistObject();
	$ret = $spamObj->filter( $editPage->mArticle->getTitle(), $text, '', $editPage );
	// Return convention for hooks is the inverse of $wgFilterCallback
	return !$ret;
}

/**
 * Hook function for EditFilter
 * Confirm that a local blacklist page being saved is valid,
 * and toss back a warning to the user if it isn't.
 */
function wfSpamBlacklistValidate( $editPage, $text, $section, &$hookError ) {
	$spamObj = wfSpamBlacklistObject();
	return $spamObj->validate( $editPage, $text, $section, &$hookError );
}

/**
 * Hook function for ArticleSaveComplete
 * Clear local spam blacklist caches on page save.
 */
function wfSpamBlacklistArticleSave( &$article, &$user, $text, $summary, $isminor, $iswatch, $section ) {
	$spamObj = wfSpamBlacklistObject();
	return $spamObj->onArticleSave( &$article, &$user, $text, $summary, $isminor, $iswatch, $section );
}

