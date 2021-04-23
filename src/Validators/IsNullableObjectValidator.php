<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Validators;

use function is_object;

/**
 * Represents a validator validating if a value is a nullable object value.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class IsNullableObjectValidator implements ValidatorInterface
{
	/**
	 * {@inheritDoc}
	 */
	public function validate( $value ): bool
	{
		return null === $value || is_object( $value );
	}
}
