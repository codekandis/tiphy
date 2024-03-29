<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Http\Requests;

/**
 * Represents the interface of any range interpreter.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
interface RangeInterpreterInterface
{
	/**
	 * Interprets a range.
	 * @param string $value The range to interpret.
	 * @return ?Range The interpreted range.
	 */
	public function interpret( string $value ): ?Range;
}
