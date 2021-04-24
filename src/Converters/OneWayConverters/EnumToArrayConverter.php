<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Converters\OneWayConverters;

use CodeKandis\Tiphy\Converters\OneWayConverterInterface;
use ReflectionClass;
use ReflectionException;
use function in_array;
use function sprintf;

/**
 * Represents an converter converting enums to arrays of values.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class EnumToArrayConverter implements OneWayConverterInterface
{
	/**
	 * Represents the error message if an enum class does not exist.
	 * @var string
	 */
	protected const ERROR_ENUM_CLASS_NOT_FOUND = 'The enum class `%s` does not exist.';

	/**
	 * {@inheritDoc}
	 * @throws EnumClassNotFoundException The enum class does not exist.
	 */
	public function convert( $value )
	{
		try
		{
			$reflectedClass = new ReflectionClass( $value );
		}
		catch ( ReflectionException $exception )
		{
			throw new EnumClassNotFoundException(
				sprintf(
					self::ERROR_ENUM_CLASS_NOT_FOUND,
					$value
				)
			);
		}

		$convertedValue = [];
		foreach ( $reflectedClass->getConstants() as $constantValue )
		{
			if ( false === in_array( $constantValue, $convertedValue, true ) )
			{
				$convertedValue[] = $constantValue;
			}
		}

		return $convertedValue;
	}
}
