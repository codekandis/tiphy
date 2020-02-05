<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Http\Requests;

use function preg_match;

/**
 * Represents a range interpreter.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class RangeInterpreter implements RangeInterpreterInterface
{
	/**
	 * {@inheritdoc}
	 */
	public function interpret( string $value ): ?Range
	{
		$matches = [];

		$isMatching = preg_match( '~^bytes=(?<offsetStart>\d+)-(?<offsetEnd>\d+)$~', $value, $matches );
		if ( 1 === $isMatching )
		{
			return new Range( (int) $matches[ 'offsetStart' ], (int) $matches[ 'offsetEnd' ] );
		}

		$isMatching = preg_match( '~^bytes=(?<offsetStart>\d+)-$~', $value, $matches );
		if ( 1 === $isMatching )
		{
			return new Range( (int) $matches[ 'offsetStart' ], null );
		}

		$isMatching = preg_match( '~^bytes=(?<offsetStart>-\d+)$~', $value, $matches );
		if ( 1 === $isMatching )
		{
			return new Range( (int) $matches[ 'offsetStart' ], null );
		}

		return new Range( null, null );
	}
}
