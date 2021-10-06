<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Entities\EntityPropertyMappings;

use CodeKandis\Tiphy\Converters\BiDirectionalConverterInterface;

/**
 * Represents the interface of all entity property mappings.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
interface EntityPropertyMappingInterface
{
	/**
	 * Gets the name of the property to map.
	 * @return string The name of the property to map.
	 */
	public function getPropertyName(): string;

	/**
	 * Gets the two-ways converter of the mapping.
	 * @return ?BiDirectionalConverterInterface The two-ways converter of the mapping.
	 */
	public function getConverter(): ?BiDirectionalConverterInterface;
}
