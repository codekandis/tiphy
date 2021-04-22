<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Validators;

use function is_int;

/**
 * Represents a validator validating if a value is an integer value.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class IsIntValidator implements ValidatorInterface
{
	/**
	 * {@inheritDoc}
	 */
	public function validate( $value ): bool
	{
		return is_int( $value );
	}
}
