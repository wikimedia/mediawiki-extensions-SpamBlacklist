<?php

/**
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
 * http://www.gnu.org/copyleft/gpl.html
 *
 * @file
 */

use MediaWiki\Extension\SpamBlacklist\BaseBlacklist;
use MediaWiki\Page\PageReferenceValue;

/**
 * @covers \MediaWiki\Extension\SpamBlacklist\BaseBlacklist
 */
class BaseBlacklistTest extends MediaWikiIntegrationTestCase {

	public static function provideGetTypeFromPage(): array {
		return [
			[ NS_MEDIAWIKI, 'Spam-blacklist', 'spam' ],
			[ NS_MEDIAWIKI, 'Spam-whitelist', 'spam' ],
			[ NS_MEDIAWIKI, 'Email-whitelist', 'email' ],
			[ NS_MEDIAWIKI, 'Email-blacklist', 'email' ],
			[ NS_MEDIAWIKI, 'A random page', false ],
			[ NS_MAIN, 'Another random page', false ],
		];
	}

	/**
	 * @dataProvider provideGetTypeFromPage
	 */
	public function testGetTypeFromPage( int $namespace, string $dbKey, string|false $expected ) {
		$page = PageReferenceValue::localReference( $namespace, $dbKey );
		$output = BaseBlacklist::getTypeFromPage( $page );
		$this->assertEquals( $expected, $output );
	}
}
