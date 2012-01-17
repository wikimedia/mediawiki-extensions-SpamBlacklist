<?php

/**
 * Hooks for the spam blacklist extension
 */
class SpamBlacklistHooks {

	/**
	 * Hook function for EditFilterMerged
	 *
	 * @param $editPage EditPage
	 * @param $text string
	 * @param $hookErr string
	 * @param $editSummary string
	 * @return bool
	 */
	static function filterMerged( $editPage, $text, &$hookErr, $editSummary ) {
		global $wgTitle;
		if( is_null( $wgTitle ) ) {
			# API mode
			# wfSpamBlacklistFilterAPIEditBeforeSave already checked the blacklist
			return true;
		}

		$spamObj = BaseBlacklist::getInstance( 'spam' );
		$title = $editPage->mArticle->getTitle();
		$ret = $spamObj->filter( $title, $text, '', $editSummary, $editPage );
		if ( $ret !== false ) {
			// spamPageWithContent() method was added in MW 1.17
			if ( method_exists( $editPage, 'spamPageWithContent' ) ) {
				$editPage->spamPageWithContent( $ret );
			} else {
				$editPage->spamPage( $ret );
			}
		}
		// Return convention for hooks is the inverse of $wgFilterCallback
		return ( $ret === false );
	}

	/**
	 * Hook function for APIEditBeforeSave
	 *
	 * @param $editPage EditPage
	 * @param $text string
	 * @param $resultArr array
	 * @return bool
	 */
	static function filterAPIEditBeforeSave( $editPage, $text, &$resultArr ) {
		$spamObj = BaseBlacklist::getInstance( 'spam' );
		$title = $editPage->mArticle->getTitle();
		$ret = $spamObj->filter( $title, $text, '', '', $editPage );
		if ( $ret!==false ) {
			$resultArr['spamblacklist'] = $ret;
		}
		// Return convention for hooks is the inverse of $wgFilterCallback
		return ( $ret === false );
	}

	/**
	 * Hook function for EditFilter
	 * Confirm that a local blacklist page being saved is valid,
	 * and toss back a warning to the user if it isn't.
	 *
	 * @param $editPage EditPage
	 * @param $text string
	 * @param $section string
	 * @param $hookError string
	 * @return bool
	 */
	static function validate( $editPage, $text, $section, &$hookError ) {
		$thisPageName = $editPage->mTitle->getPrefixedDBkey();

		if( !BaseBlacklist::isLocalSource( $editPage->mTitle ) ) {
			wfDebugLog( 'SpamBlacklist', "Spam blacklist validator: [[$thisPageName]] not a local blacklist\n" );
			return true;
		}

		$lines = explode( "\n", $text );

		$badLines = SpamRegexBatch::getBadLines( $lines );
		if( $badLines ) {
			wfDebugLog( 'SpamBlacklist', "Spam blacklist validator: [[$thisPageName]] given invalid input lines: " .
				implode( ', ', $badLines ) . "\n" );

			$badList = "*<tt>" .
				implode( "</tt>\n*<tt>",
					array_map( 'wfEscapeWikiText', $badLines ) ) .
				"</tt>\n";
			$hookError =
				"<div class='errorbox'>" .
					wfMsgExt( 'spam-invalid-lines', array( 'parsemag' ), count( $badLines ) ) . "<br />" .
					$badList .
					"</div>\n" .
					"<br clear='all' />\n";
			return true;
		} else {
			wfDebugLog( 'SpamBlacklist', "Spam blacklist validator: [[$thisPageName]] ok or empty blacklist\n" );
			return true;
		}
	}

	/**
	 * Hook function for ArticleSaveComplete
	 * Clear local spam blacklist caches on page save.
	 *
	 * @param $article Article
	 * @param $user User
	 * @param $text string
	 * @param $summary string
	 * @param $isminor
	 * @param $iswatch
	 * @param $section
	 * @return bool
	 */
	static function articleSave( &$article, &$user, $text, $summary, $isminor, $iswatch, $section ) {
		if( !BaseBlacklist::isLocalSource( $article->getTitle() ) ) {
			return false;
		}
		global $wgMemc, $wgDBname;

		// This sucks because every Blacklist needs to be cleared
		foreach ( BaseBlacklist::getBlacklistTypes() as $type => $class ) {
			$wgMemc->delete( "$wgDBname:{$type}_blacklist_regexes" );
		}
	}
}
