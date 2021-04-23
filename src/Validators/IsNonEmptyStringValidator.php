<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Validators;

use function is_string;

/**
 * Represents a validator validating if a value is a non-empty string value.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class IsNonEmptyStringValidator implements ValidatorInterface
{
	/**
	 * {@inheritDoc}
	 */
	public function validate( $value ): bool
	{
		return is_string( $value ) && '' !== $value;
	}
}
