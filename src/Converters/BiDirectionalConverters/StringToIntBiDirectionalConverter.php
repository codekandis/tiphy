<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Converters\BiDirectionalConverters;

use function is_int;
use function is_string;

/**
 * Represents a bi-directional converter converting between string and int.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class StringToIntBiDirectionalConverter extends AbstractBiDirectionalConverter
{
	/**
	 * Converts from a string into an int value.
	 * @param string $value The string value which has to be converted.
	 * @return int The converted int value.
	 */
	public function convertTo( $value )
	{
		if ( false === is_string( $value ) )
		{
			throw $this->getInvalidTypeException( $value, 'string' );
		}

		return (int) $value;
	}

	/**
	 * Converts from an int into a string value.
	 * @param int $value The int value which has to be converted.
	 * @return string The converted string value.
	 */
	public function convertFrom( $value )
	{
		if ( false === is_int( $value ) )
		{
			throw $this->getInvalidTypeException( $value, 'int' );
		}

		return (string) $value;
	}
}
