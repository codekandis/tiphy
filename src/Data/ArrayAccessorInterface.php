<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Data;

use ArrayAccess;
use CodeKandis\Entities\ArrayableInterface;
use CodeKandis\Entities\EntityInterface;
use Countable;
use Iterator;
use JsonSerializable;

/**
 * Represents the interface of any array accessor managing arrays by reference.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
interface ArrayAccessorInterface extends Countable, Iterator, ArrayAccess, ArrayableInterface, JsonSerializable
{
	/**
	 * Gets the count of values of the collection.
	 * @return int The count of values of the collection.
	 */
	public function count(): int;

	/**
	 * Gets the current value.
	 * @return EntityInterface The current value.
	 */
	public function current(): EntityInterface;

	/**
	 * Moves the internal pointer to the next value.
	 */
	public function next(): void;

	/**
	 * Gets the index of the current value.
	 * @return null|int|string The index of the current value, null if the internal pointer does not point to any value.
	 */
	public function key();

	/**
	 * Determines if the current internal pointer position is valid.
	 * @return bool True if the current internal pointer position is valid, otherwise false.
	 */
	public function valid(): bool;

	/**
	 * Rewinds the internal pointer.
	 */
	public function rewind(): void;

	/**
	 * Determines if a specified index exists.
	 * @param int|string $index The index to determine.
	 * @return bool True if the specified index exists, otherwise false.
	 */
	public function offsetExists( $index ): bool;

	/**
	 * Gets the value at a specified index.
	 * @param int|string $index The index of the value.
	 * @return mixed The value to get.
	 * @throws ArrayIndexNotFoundException The passed index does not exist.
	 */
	public function offsetGet( $index );

	/**
	 * Sets the value at a specified index.
	 * @param int|string $index The index of the value.
	 * @param mixed $value The value to set.
	 */
	public function offsetSet( $index, $value ): void;

	/**
	 * Unsets the value at a specified index.
	 * @param int|string $index The index of the value.
	 * @throws ArrayIndexNotFoundException The passed index does not exist.
	 */
	public function offsetUnset( $index ): void;

	/**
	 * Determines if the array contains a specific index.
	 * @param int|string $index The index to determine if it exists.
	 * @return bool True if the array contains the specific index, otherwise false.
	 */
	public function has( $index ): bool;

	/**
	 * Gets a specific value from the array.
	 * @param int|string $index The index of the value.
	 * @return mixed The value.
	 * @throws ArrayIndexNotFoundException The passed index does not exist.
	 */
	public function get( $index );

	/**
	 * Gets a specific value from the array or a specific default value, if the index value pair does not exist.
	 * @param int|string $index The index of the value.
	 * @param mixed $default The default value, if the index value pair does not exist.
	 * @return mixed The value or default value.
	 */
	public function getDefaulted( $index, $default );

	/**
	 * Sets a specific value of the array.
	 * @param int|string $index The index of the value.
	 * @param mixed $value The value to set.
	 */
	public function set( $index, $value ): void;

	/**
	 * Removes a specific value from the array.
	 * @param int|string $index The index of the value.
	 * @throws ArrayIndexNotFoundException The passed index does not exist.
	 */
	public function unset( $index ): void;

	/**
	 * Gets a copy of the underlying array.
	 * @return array The underlying array.
	 */
	public function toArray(): array;

	/**
	 * Gets the JSON serialized underlying array.
	 * @return array The JSON serialized underlying array.
	 */
	public function jsonSerialize();
}
