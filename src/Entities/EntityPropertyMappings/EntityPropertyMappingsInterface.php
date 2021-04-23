<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Entities\EntityPropertyMappings;

use Countable;

/**
 * Represents the interface of all entity property mapping lists.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
interface EntityPropertyMappingsInterface extends Countable
{
	/**
	 * Gets the amount of entity property mappings in the list.
	 * @return int The amount of entity property mappings in the list.
	 */
	public function count(): int;

	/**
	 * Adds entity property mappings to the list.
	 * @param EntityPropertyMappingInterface ...$entityPropertyMappings The entity property mappings to add.
	 * @throws EntityPropertyMappingExistsException An entity property mapping with a specific property name already exists.
	 */
	public function add( EntityPropertyMappingInterface... $entityPropertyMappings ): void;

	/**
	 * Gets an entity property mapping by its property name.
	 * @param string $propertyName The property name.
	 * @return ?EntityPropertyMappingInterface The entity mapping.
	 */
	public function findByPropertyName( string $propertyName ): ?EntityPropertyMappingInterface;
}
