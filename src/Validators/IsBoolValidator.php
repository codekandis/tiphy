<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Validators;

use function is_bool;

/**
 * Represents a validator validating if a value is a boolean value.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class IsBoolValidator implements ValidatorInterface
{
	/**
	 * {@inheritDoc}
	 */
	public function validate( $value ): bool
	{
		return is_bool( $value );
	}
}
