<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Converters\BiDirectionalConverters;

use CodeKandis\Tiphy\Converters\BiDirectionalConverterInterface;

/**
 * Represents a bi-directional converter converting between string and bool.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class StringToBoolBiDirectionalConverter implements BiDirectionalConverterInterface
{
	/**
	 * Converts from a string into a bool value.
	 * @param string $value The string value which has to be converted.
	 * @return bool The converted bool value.
	 */
	public function convertTo( $value )
	{
		return '0' === $value ? false : true;
	}

	/**
	 * Converts from a bool into a string value.
	 * @param bool $value The bool value which has to be converted.
	 * @return string The converted string value.
	 */
	public function convertFrom( $value )
	{
		return false === $value ? '0' : '1';
	}
}
