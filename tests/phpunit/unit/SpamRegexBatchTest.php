<?php

namespace MediaWiki\Extension\SpamBlacklist\Tests\Unit;

use MediaWiki\Extension\SpamBlacklist\BaseBlacklist;
use MediaWiki\Extension\SpamBlacklist\SpamRegexBatch;
use MediaWikiUnitTestCase;
use Wikimedia\TestingAccessWrapper;

/**
 * @group SpamBlacklist
 * @covers \MediaWiki\Extension\SpamBlacklist\SpamRegexBatch
 */
class SpamRegexBatchTest extends MediaWikiUnitTestCase {

	public static function provideStripLinesCases(): array {
		return [
			'plain line unchanged' => [
				[ 'example.com' ],
				[ 'example.com' ],
			],

			'leading and trailing whitespace trimmed' => [
				[ '   example.com   ' ],
				[ 'example.com' ],
			],

			'trailing comment removed' => [
				[ 'example.com # comment' ],
				[ 'example.com' ],
			],

			'comment-only and blank lines removed' => [
				[
					'# comment',
					'',
					'   ',
					'example.com',
				],
				[
					3 => 'example.com',
				],
			],
		];
	}

	/**
	 * @dataProvider provideStripLinesCases
	 */
	public function testStripLines( array $input, array $expected ): void {
		$wrapper = TestingAccessWrapper::newFromClass( SpamRegexBatch::class );

		$this->assertSame(
			$expected,
			$wrapper->stripLines( $input )
		);
	}

	public static function provideValidateRegexesCases(): array {
		return [
			'all valid regexes' => [
				[ '/example/', '/spam/i', '/^test$/' ],
				true,
			],

			'one invalid regex' => [
				[ '/example/', '/[abc/' ],
				false,
			],

			'empty regex array' => [
				[],
				true,
			],
		];
	}

	/**
	 * @dataProvider provideValidateRegexesCases
	 */
	public function testValidateRegexes( array $input, bool $expected ): void {
		$wrapper = TestingAccessWrapper::newFromClass( SpamRegexBatch::class );

		$this->assertSame(
			$expected,
			$wrapper->validateRegexes( $input )
		);
	}

	public static function provideBuildRegexesCases(): array {
		return [
			'empty input' => [
				[],
				[],
			],

			'single line' => [
				[ 'example.com' ],
				[
					'/example.com/',
				],
			],

			'two lines in single batch' => [
				[
					'foo.com',
					'bar.com',
				],
				[
					'/foo.com|bar.com/',
				],
			],

			'line ending in backslash' => [
				[
					'foo.com',
					'bad\\',
				],
				[
					'/foo.com/',
				],
			],
		];
	}

	/**
	 * @dataProvider provideBuildRegexesCases
	 */
	public function testBuildRegexes( array $lines, array $expected ): void {
		$blacklist = $this->createMock( BaseBlacklist::class );
		$blacklist->method( 'getRegexStart' )->willReturn( '/' );
		$blacklist->method( 'getRegexEnd' )->willReturn( '/' );

		$wrapper = TestingAccessWrapper::newFromClass( SpamRegexBatch::class );

		$this->assertSame(
			$expected,
			$wrapper->buildRegexes( $lines, $blacklist )
		);
	}

	public function testBuildRegexesSplitsOnBatchOverflow(): void {
		$blacklist = $this->createMock( BaseBlacklist::class );
		$blacklist->method( 'getRegexStart' )->willReturn( '/' );
		$blacklist->method( 'getRegexEnd' )->willReturn( '/' );

		$wrapper = TestingAccessWrapper::newFromClass( SpamRegexBatch::class );

		// With a small batchSize, the second line overflows the running batch,
		// so the first line is flushed into its own regex and a new batch starts.
		$this->assertSame(
			[ '/foo.com/', '/bar.com/' ],
			$wrapper->buildRegexes( [ 'foo.com', 'bar.com' ], $blacklist, 5 )
		);
	}

	public static function provideRegexesFromTextCases(): array {
		return [
			'multiple lines' => [
				"foo.com\nbar.com",
				[
					'/foo.com|bar.com/',
				],
			],

			'empty string' => [
				'',
				[],
			],
		];
	}

	/**
	 * @dataProvider provideRegexesFromTextCases
	 */
	public function testRegexesFromText( string $text, array $expected ): void {
		$blacklist = $this->createMock( BaseBlacklist::class );
		$blacklist->method( 'getRegexStart' )->willReturn( '/' );
		$blacklist->method( 'getRegexEnd' )->willReturn( '/' );

		$this->assertSame(
			$expected,
			SpamRegexBatch::regexesFromText( $text, $blacklist )
		);
	}

	public static function provideGetBadLinesCases(): array {
		return [
			'no bad lines' => [
				[
					'foo.com',
					'bar.com',
				],
				[],
			],

			'trailing backslash line' => [
				[
					'foo.com',
					'bad\\',
				],
				[
					'bad\\',
				],
			],
		];
	}

	/**
	 * @dataProvider provideGetBadLinesCases
	 */
	public function testGetBadLines( array $lines, array $expected ): void {
		$blacklist = $this->createMock( BaseBlacklist::class );
		$blacklist->method( 'getRegexStart' )->willReturn( '/' );
		$blacklist->method( 'getRegexEnd' )->willReturn( '/' );

		$this->assertSame(
			$expected,
			SpamRegexBatch::getBadLines( $lines, $blacklist )
		);
	}
}
