<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Validators\ArrayValidators;

use CodeKandis\Tiphy\Validators\ValidatorInterface;

/**
 * Represents the interface of all array validators.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
interface MappedArrayValidatorInterface extends ValidatorInterface
{
	/**
	 * {@inheritDoc}
	 * Validates the array.
	 * @param mixed $value The array to validate.
	 * @return bool True if the array is valid, false otherwise.
	 */
	public function validate( $value ): bool;

	/**
	 * Gets the array validator mappings of the array.
	 * @return ArrayValidatorMappingsInterface The array validator mappings of the array.
	 */
	public function getArrayValidatorMappings(): ArrayValidatorMappingsInterface;
}
