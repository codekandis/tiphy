<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Validators;

/**
 * Represents the interface of all validators.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
interface ValidatorInterface
{
	/**
	 * Validates a value.
	 * @param mixed $value The value to validate.
	 * @return bool True if the value is valid, false otherwise.
	 */
	public function validate( $value ): bool;
}
