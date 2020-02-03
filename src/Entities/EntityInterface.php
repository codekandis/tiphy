<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Entities;

use JsonSerializable;
use ReflectionException;

/**
 * Represents the interface of all entities.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
interface EntityInterface extends JsonSerializable
{
	/**
	 * Converts the antity into an array.
	 * @return array The array representation of the entity.
	 * @throws ReflectionException An error occurred during the conversion.
	 */
	public function toArray(): array;

	/**
	 * Creates an entity from an array.
	 * @return EntityInterface The entity created from the array.
	 * @throws ReflectionException An error occurred during the creation.
	 */
	public static function fromArray( array $data ): EntityInterface;

	/**
	 * Creates an entity from an object.
	 * @return EntityInterface The entity created from the object.
	 * @throws ReflectionException An error occurred during the creation.
	 */
	public static function fromObject( object $data ): EntityInterface;

	/**
	 * Converts the entity into a JSON serializable array.
	 * @return array The JSON serializable array.
	 * @throws ReflectionException An error occured during the conversion.
	 */
	public function jsonSerialize(): array;
}
