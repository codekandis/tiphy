<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Validators;

use function is_array;

/**
 * Represents a validator validating if a value is a nullable array value.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class IsNullableArrayValidator implements ValidatorInterface
{
	/**
	 * {@inheritDoc}
	 */
	public function validate( $value ): bool
	{
		return null === $value || is_array( $value );
	}
}
