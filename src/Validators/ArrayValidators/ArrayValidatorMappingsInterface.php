<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Validators\ArrayValidators;

use Countable;
use Iterator;

/**
 * Represents the interface of all array validator mapping lists.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
interface ArrayValidatorMappingsInterface extends Countable, Iterator
{
	/**
	 * Gets the amount of array validator mappings in the list.
	 * @return int The amount of array validator mappings in the list.
	 */
	public function count(): int;

	/**
	 * Gets the current array validator mapping of the list.
	 * @return ArrayValidatorMappingInterface The current array validator mapping of the list.
	 */
	public function current();

	/**
	 * Gets the key of the current array validator mapping of the list.
	 * @return scalar The key of the current array validator mapping of the list.
	 */
	public function key();

	/**
	 * Moves the internal pointer to the next array validator mapping of the list.
	 */
	public function next(): void;

	/**
	 * Rewinds the internal pointer to the first array validator mapping of the list.
	 */
	public function rewind(): void;

	/**
	 * Determines if the internal pointer points to an array validator mapping of the list.
	 * @return bool True if the internal pointer points to an array validator mapping of the list, false otherwise.
	 */
	public function valid(): bool;

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
