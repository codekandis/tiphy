<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Converters\UniDirectionalConverters;

use CodeKandis\Tiphy\Converters\UniDirectionalConverterInterface;
use CodeKandis\Tiphy\Types\InvalidTypeException;
use CodeKandis\Tiphy\Types\TypeDeterminator;
use function get_class;
use function gettype;
use function is_object;
use function sprintf;

/**
 * Represents the base class of any uni-directional converter.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
abstract class AbstractUniDirectionalConverter implements UniDirectionalConverterInterface
{
	/**
	 * Represents the error message if the type of a value to convert is not valid.
	 * @var string
	 */
	protected const ERROR_INVALID_VALUE_TYPE = 'The type of the value is not valid. `%s` expected, but `%s` given.';

	/**
	 * Get the InvalidTypeException.
	 * @param mixed $value The given value.
	 * @param string $expectedType The expected type.
	 * @return InvalidTypeException The InvalidTypeException.
	 */
	protected function getInvalidTypeException( $value, string $expectedType ): InvalidTypeException
	{
		$givenType = true === is_object( $value )
			? get_class( $value )
			: gettype( $value );

		return new InvalidTypeException(
			sprintf(
				static::ERROR_INVALID_VALUE_TYPE,
				'string',
				( new TypeDeterminator( false ) )
					->determine( $value )
			)
		);
	}
}
