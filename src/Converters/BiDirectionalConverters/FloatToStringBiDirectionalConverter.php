<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Converters\BiDirectionalConverters;

use CodeKandis\Tiphy\Converters\InvalidValueTypeException;
use function is_float;
use function is_string;

/**
 * Represents a bi-directional converter converting between float and string.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class FloatToStringBiDirectionalConverter extends AbstractBiDirectionalConverter
{
	/**
	 * Converts from a float into a string value.
	 * @param float $value The float value which has to be converted.
	 * @return string The converted string value.
	 */
	public function convertTo( $value )
	{
		if ( false === is_float( $value ) )
		{
			throw new InvalidValueTypeException( static::ERROR_INVALID_VALUE_TYPE );
		}

		return (string) $value;
	}

	/**
	 * Converts from a string into a float value.
	 * @param string $value The string value which has to be converted.
	 * @return float The converted float value.
	 */
	public function convertFrom( $value )
	{
		if ( false === is_string( $value ) )
		{
			throw new InvalidValueTypeException( static::ERROR_INVALID_VALUE_TYPE );
		}

		return (float) $value;
	}
}
