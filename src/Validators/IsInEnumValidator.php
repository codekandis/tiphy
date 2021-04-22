<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Validators;

use CodeKandis\Tiphy\Converters\OneWayConverters\EnumClassNotFoundException;
use CodeKandis\Tiphy\Converters\OneWayConverters\EnumToArrayConverter;
use function in_array;

/**
 * Represents a validator validiation if a value is an enum value.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class IsInEnumValidator implements ValidatorInterface
{
	/**
	 * Stores the values of the enum.
	 * @var mixed[]
	 */
	private array $enumValues;

	/**
	 * Constructor method.
	 * @param string $enumClassName The class name of the enum.
	 * @throws EnumClassNotFoundException The enum class does not exist.
	 */
	public function __construct( string $enumClassName )
	{
		$this->enumValues = ( new EnumToArrayConverter() )
			->convert( $enumClassName );
	}

	/**
	 * {@inheritDoc}
	 */
	public function validate( $value ): bool
	{
		return in_array( $value, $this->enumValues, true );
	}
}