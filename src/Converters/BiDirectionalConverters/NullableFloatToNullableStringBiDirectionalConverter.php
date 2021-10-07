<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Converters\BiDirectionalConverters;

use function is_float;
use function is_string;

/**
 * Represents a bi-directional converter converting between nullable float and nullable string.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class NullableFloatToNullableStringBiDirectionalConverter extends AbstractBiDirectionalConverter
{
	/**
	 * Converts from a nullable float into a nullable string value.
	 * @param ?float $value The nullable float value which has to be converted.
	 * @return ?string The converted nullable string value.
	 */
	public function convertTo( $value )
	{
		if ( null !== $value && false === is_float( $value ) )
		{
			throw $this->getInvalidTypeException( $value, '?float' );
		}

		return null === $value
			? null
			: (string) $value;
	}

	/**
	 * Converts from a nullable string into a nullable float value.
	 * @param ?string $value The nullable string value which has to be converted.
	 * @return ?float The converted nullable float value.
	 */
	public function convertFrom( $value )
	{
		if ( null !== $value && false === is_string( $value ) )
		{
			throw $this->getInvalidTypeException( $value, '?string' );
		}

		return null === $value
			? null
			: (float) $value;
	}
}
