<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Converters\BiDirectionalConverters;

use CodeKandis\Tiphy\Converters\InvalidValueTypeException;
use function is_bool;
use function is_string;

/**
 * Represents a bi-directional converter converting between nullable bool and nullable string.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class NullableBoolToNullableStringBiDirectionalConverter extends AbstractBiDirectionalConverter
{
	/**
	 * Converts from a nullable bool into a nullable string value.
	 * @param ?bool $value The nullable bool value which has to be converted.
	 * @return ?string The converted nullable string value.
	 */
	public function convertTo( $value )
	{
		if ( null !== $value && false === is_bool( $value ) )
		{
			throw new InvalidValueTypeException( static::ERROR_INVALID_VALUE_TYPE );
		}

		return null === $value
			? null
			: (
				false === $value
					? '0'
					: '1'
			);
	}

	/**
	 * Converts from a nullable string into a nullable bool value.
	 * @param ?string $value The nullable string value which has to be converted.
	 * @return ?bool The converted nullable bool value.
	 */
	public function convertFrom( $value )
	{
		if ( null !== $value && false === is_string( $value ) )
		{
			throw new InvalidValueTypeException( static::ERROR_INVALID_VALUE_TYPE );
		}

		return null === $value
			? null
			: (
				'0' === $value
					? false
					: true
			);
	}
}
