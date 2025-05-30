<?php

namespace MediaWiki\Extension\SpamBlacklist;

use MediaWiki\Logging\LogFormatter;
use MediaWiki\Message\Message;

class SpamBlacklistLogFormatter extends LogFormatter {
	/**
	 * @return array
	 * @suppress SecurityCheck-DoubleEscaped Known taint-check bug
	 */
	protected function getMessageParameters() {
		$params = parent::getMessageParameters();
		$params[3] = Message::rawParam( htmlspecialchars( $params[3] ) );
		return $params;
	}

}
