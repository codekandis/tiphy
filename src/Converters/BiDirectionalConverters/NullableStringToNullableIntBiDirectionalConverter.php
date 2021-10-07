<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Converters\BiDirectionalConverters;

use function is_int;
use function is_string;

/**
 * Represents a bi-directional converter converting between nullable string and nullable int.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class NullableStringToNullableIntBiDirectionalConverter extends AbstractBiDirectionalConverter
{
	/**
	 * Converts from a nullable string into a nullable int value.
	 * @param ?string $value The nullable string value which has to be converted.
	 * @return ?int The converted nullable int value.
	 */
	public function convertTo( $value )
	{
		if ( null !== $value && false === is_string( $value ) )
		{
			throw $this->getInvalidTypeException( $value, '?string' );
		}

		return null === $value
			? null
			: (int) $value;
	}

	/**
	 * Converts from a nullable int into a nullable string value.
	 * @param ?int $value The nullable int value which has to be converted.
	 * @return ?string The converted nullable string value.
	 */
	public function convertFrom( $value )
	{
		if ( null !== $value && false === is_int( $value ) )
		{
			throw $this->getInvalidTypeException( $value, '?int' );
		}

		return null === $value
			? null
			: (string) $value;
	}
}
