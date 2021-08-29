<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Converters\TwoWaysConverters;

use CodeKandis\Tiphy\Converters\TwoWaysConverterInterface;

/**
 * Represents a two ways converter converting between string and int.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class StringToIntConverter implements TwoWaysConverterInterface
{
	/**
	 * Converts from a string into an int value.
	 * @param string $value The string value which has to be converted.
	 * @return int The converted int value.
	 */
	public function convertTo( $value )
	{
		return (int) $value;
	}

	/**
	 * Converts from an int into a string value.
	 * @param int $value The int value which has to be converted.
	 * @return string The converted string value.
	 */
	public function convertFrom( $value )
	{
		return (string) $value;
	}
}
