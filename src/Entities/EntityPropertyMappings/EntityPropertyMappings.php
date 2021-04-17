<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Entities\EntityPropertyMappings;

use function count;
use function sprintf;

class EntityPropertyMappings implements EntityPropertyMappingsInterface
{
	/**
	 * Represents the error message if an entity property mapping for a specific property already exists.
	 * @var string
	 */
	protected const ERROR_ENTITY_PROPERTY_MAPPING_EXISTS = 'An entity property mapping with the property name \'%s\' already exists.';

	/**
	 * Stores the entity property mappings of the list.
	 * @var EntityPropertyMappingInterface[]
	 */
	private array $entityPropertyMappings = [];

	/**
	 * {@inheritDoc}
	 */
	public function count(): int
	{
		return count( $this->entityPropertyMappings );
	}

	/**
	 * {@inheritDoc}
	 */
	public function add( EntityPropertyMappingInterface ...$entityPropertyMappings ): void
	{
		foreach ( $entityPropertyMappings as $entityPropertyMapping )
		{
			if ( null !== $this->findByPropertyName( $entityPropertyMapping->getPropertyName() ) )
			{
				throw new EntityPropertyMappingExistsException(
					sprintf(
						static::ERROR_ENTITY_PROPERTY_MAPPING_EXISTS,
						$entityPropertyMapping->getPropertyName()
					)
				);
			}
			$this->entityPropertyMappings[] = $entityPropertyMapping;
		}
	}

	/**
	 * {@inheritDoc}
	 */
	public function findByPropertyName( string $propertyName ): ?EntityPropertyMappingInterface
	{
		foreach ( $this->entityPropertyMappings as $entityPropertyMapping )
		{
			if ( $entityPropertyMapping->getPropertyName() === $propertyName )
			{
				return $entityPropertyMapping;
			}
		}

		return null;
	}
}
