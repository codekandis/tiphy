<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Validators;

use function is_array;

/**
 * Represents a validator validating if a value is an array value.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class IsArrayValidator implements ValidatorInterface
{
	/**
	 * {@inheritDoc}
	 */
	public function validate( $value ): bool
	{
		return is_array( $value );
	}
}
