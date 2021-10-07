<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Converters;

/**
 * Represents the interface of any bi-directional converters.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
interface BiDirectionalConverterInterface
{
	/**
	 * Converts into a value.
	 * @param mixed $value The value which has to be converted.
	 * @return mixed The converted value.
	 */
	public function convertTo( $value );

	/**
	 * Converts from a value.
	 * @param mixed $value The value which has to be converted.
	 * @return mixed The converted value.
	 */
	public function convertFrom( $value );
}
