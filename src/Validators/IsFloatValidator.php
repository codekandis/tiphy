<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Validators;

use function is_float;

/**
 * Represents a validator validating if a value is a float value.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class IsFloatValidator implements ValidatorInterface
{
	/**
	 * {@inheritDoc}
	 */
	public function validate( $value ): bool
	{
		return is_float( $value );
	}
}
