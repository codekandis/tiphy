<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Http\Requests;

use CodeKandis\RegularExpressions\RegularExpression;

/**
 * Represents a range interpreter.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class RangeInterpreter implements RangeInterpreterInterface
{
	/**
	 * {@inheritDoc}
	 */
	public function interpret( string $value ): ?Range
	{
		$matches = ( new RegularExpression( '~^bytes=(?<offsetStart>\d+)-(?<offsetEnd>\d+)$~' ) )
			->match( $value, false );
		if ( null !== $matches )
		{
			return new Range( (int) $matches[ 'offsetStart' ], (int) $matches[ 'offsetEnd' ] );
		}

		$matches = ( new RegularExpression( '~^bytes=(?<offsetStart>\d+)-$~' ) )
			->match( $value, false );
		if ( null !== $matches )
		{
			return new Range( (int) $matches[ 'offsetStart' ], null );
		}

		return new Range( null, null );
	}
}
