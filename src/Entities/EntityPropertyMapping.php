<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Entities\EntityPropertyMappings;

use CodeKandis\Tiphy\Converters\TwoWaysConverterInterface;

/**
 * Represents an entity property mapping.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class EntityPropertyMapping implements EntityPropertyMappingInterface
{
	/**
	 * Stores the name of the property to map.
	 * @var string
	 */
	private string $propertyName;

	/**
	 * Stores the two-ways converter of the mapping.
	 * @var ?TwoWaysConverterInterface
	 */
	private ?TwoWaysConverterInterface $converter;

	/**
	 * Constructor method.
	 * @param string $propertyName The name of the property to map.
	 * @param ?TwoWaysConverterInterface $converter The two-ways converter of the mapping.
	 */
	public function __construct( string $propertyName, ?TwoWaysConverterInterface $converter )
	{
		$this->propertyName = $propertyName;
		$this->converter    = $converter;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getPropertyName(): string
	{
		return $this->propertyName;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getConverter(): ?TwoWaysConverterInterface
	{
		return $this->converter;
	}
}
