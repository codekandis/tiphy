<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Converters\BiDirectionalConverters;

use function is_bool;
use function is_string;

/**
 * Represents a bi-directional converter converting between string and bool.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class StringToBoolBiDirectionalConverter extends AbstractBiDirectionalConverter
{
	/**
	 * Converts from a string into a bool value.
	 * @param string $value The string value which has to be converted.
	 * @return bool The converted bool value.
	 */
	public function convertTo( $value )
	{
		if ( false === is_string( $value ) )
		{
			throw $this->getInvalidTypeException( $value, 'string' );
		}

		return '0' === $value
			? false
			: true;
	}

	/**
	 * Converts from a bool into a string value.
	 * @param bool $value The bool value which has to be converted.
	 * @return string The converted string value.
	 */
	public function convertFrom( $value )
	{
		if ( false === is_bool( $value ) )
		{
			throw $this->getInvalidTypeException( $value, 'bool' );
		}

		return false === $value
			? '0'
			: '1';
	}
}
