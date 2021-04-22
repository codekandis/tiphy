<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Validators;

use function is_string;

/**
 * Represents a validator validating if a value is a string value.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class IsStringValidator implements ValidatorInterface
{
	/**
	 * {@inheritDoc}
	 */
	public function validate( $value ): bool
	{
		return is_string( $value );
	}
}
