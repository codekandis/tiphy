<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Converters\TwoWaysConverters;

use CodeKandis\Tiphy\Converters\TwoWaysConverterInterface;

/**
 * Represents a two ways converter converting between string and float.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class StringToFloatConverter implements TwoWaysConverterInterface
{
	/**
	 * Converts from a string into a float value.
	 * @param string $value The string value which has to be converted.
	 * @return float The converted float value.
	 */
	public function convertTo( $value )
	{
		return (float) $value;
	}

	/**
	 * Converts from a float into a string value.
	 * @param float $value The float value which has to be converted.
	 * @return string The converted string value.
	 */
	public function convertFrom( $value )
	{
		return (float) $value;
	}
}
