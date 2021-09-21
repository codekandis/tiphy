<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Validators;

use Countable;
use Iterator;

/**
 * Represents the interface of any validator collection.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
interface ValidatorCollectionInterface extends Countable, Iterator, ValidatorInterface
{
	/**
	 * Gets the amount of validators of the collection.
	 * @return int The amount of validators of the collection.
	 */
	public function count(): int;

	/**
	 * Gets the current validator.
	 * @return ValidatorInterface The current validator.
	 */
	public function current();

	/**
	 * Moves the internal pointer to the next validator.
	 */
	public function next(): void;

	/**
	 * Gets the key of the current validator.
	 * @return null|int The key of the current validator, null if the internal pointer does not point to any validator.
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
}
