<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Validators\ArrayValidators;

use Countable;

/**
 * Represents the interface of all array validator mapping lists.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
interface ArrayValidatorMappingsInterface extends Countable
{
	/**
	 * Gets the amount of array validator mappings in the list.
	 * @return int The amount of array validator mappings in the list.
	 */
	public function count(): int;

	/**
	 * Adds array validator mappings to the list.
	 * @param ArrayValidatorMappingInterface ...$arrayValidatorMappings The array validator mappings to add.
	 * @throws ArrayValidatorMappingExistsException An array validator mapping with a specific array key already exists.
	 */
	public function add( ArrayValidatorMappingInterface ...$arrayValidatorMappings ): void;

	/**
	 * Gets an array validator mapping by its array key.
	 * @param string $key The array key.
	 * @return ?ArrayValidatorMappingInterface The array validator mapping.
	 */
	public function findByKey( string $key ): ?ArrayValidatorMappingInterface;
}
