<?php

/**
 * An aggressive spam cleanup script.
 * Searches the database for matching pages, and reverts them to the last non-spammed revision.
 * If all revisions contain spam, deletes the page
 */

require_once( '../../maintenance/commandLine.inc' );
require_once( 'SpamBlacklist_body.php' );

/** 
 * Find the latest revision of the article that does not contain spam and revert to it
 */
function cleanupArticle( $rev, $regex ) {
	$title = $rev->getTitle();
	$reverted = false;
	$revId = $rev->getId();
	while ( $rev && preg_match( $regex, $rev->getText() ) ) {
		# Revision::getPrevious can't be used in this way before MW 1.6 (Revision.php 1.26)
		#$rev = $rev->getPrevious();
		$revId = $title->getPreviousRevisionID( $revId );
		if ( $revId ) {
			$rev = Revision::newFromTitle( $title, $revId );
		} else {
			$rev = false;
		}
	}
	$dbw =& wfGetDB( DB_MASTER );
	$dbw->immediateBegin();
	if ( !$rev ) {
		// Didn't find a non-spammy revision, delete the page
		print "All revisions are spam, deleting...\n";
		$article = new Article( $title );
		$article->doDeleteArticle( "All revisions matched the spam blacklist" );
	} else {
		// Revert to this revision
		$article = new Article( $title );
		$article->updateArticle( $rev->getText(), "Revert spam", false, false );
	}
	$dbw->immediateCommit();
	wfDoUpdates();
}


/**
 * Do any deferred updates and clear the list
 * TODO: This could be in Wiki.php if that class made any sense at all
 */
if ( !function_exists( 'wfDoUpdates' ) ) {
	function wfDoUpdates()
	{
		global $wgPostCommitUpdateList, $wgDeferredUpdateList;
		foreach ( $wgDeferredUpdateList as $update ) { 
			$update->doUpdate();
		}
		foreach ( $wgPostCommitUpdateList as $update ) {
			$update->doUpdate();
		}
		$wgDeferredUpdateList = array();
		$wgPostCommitUpdateList = array();
	}
}

//------------------------------------------------------------------------------

$wgUser = User::newFromName( 'Spam cleanup script' );

$sb = new SpamBlacklist( $wgSpamBlacklistSettings );
if ( $wgSpamBlacklistFiles ) {
	$sb->files = $wgSpamBlacklistFiles;
}
$regex = $sb->getRegex();
if ( !$regex ) {
	print "Invalid regex, can't clean up spam\n";
	exit(1);
}

$dbr =& wfGetDB( DB_SLAVE );
$maxID = $dbr->selectField( 'page', 'MAX(page_id)' );
$reportingInterval = 100;

print "Regex is " . strlen( $regex ) . " bytes\n";
print "Searching for spam in $maxID pages...\n";

for ( $id=1; $id <= $maxID; $id++ ) {
	if ( $id % $reportingInterval == 0 ) {
		printf( "%-8d  %-5.2f%%\r", $id, $id / $maxID * 100 );
	}
	$revision = Revision::loadFromPageId( $dbr, $id );
	if ( $revision ) {
		$text = $revision->getText();
		if ( $text ) {
			if ( preg_match( $regex, $text, $matches ) ) {
				$title = $revision->getTitle();
				$titleText = $title->getPrefixedText();
				print "\nCleaning up links to {$matches[0]} in [[$titleText]]\n";
				cleanupArticle( $revision, $regex );
			}
		}
	}
}
// Just for satisfaction
printf( "%-8d  %-5.2f%%\r", $id-1, ($id-1) / $maxID * 100 );

