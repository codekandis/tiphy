<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Validators\ArrayValidators;

use function count;
use function sprintf;

class ArrayValidatorMappings implements ArrayValidatorMappingsInterface
{
	/**
	 * Represents the error message if an array validator mapping for a specific array key already exists.
	 * @var string
	 */
	protected const ERROR_ARRAY_VALIDATOR_MAPPING_EXISTS = 'An array validator mapping with the array key \'%s\' already exists.';

	/**
	 * Stores the array validator mappings of the list.
	 * @var ArrayValidatorMappingInterface[]
	 */
	private array $arrayValidatorMappings = [];

	/**
	 * Constructor method.
	 * @param ArrayValidatorMappingInterface ...$arrayValidatorMappings The array validator mappings of the list.
	 * @throws ArrayValidatorMappingExistsException An array validator mapping with a specific array key already exists.
	 */
	public function __construct( ArrayValidatorMappingInterface ...$arrayValidatorMappings )
	{
		$this->add( ...$arrayValidatorMappings );
	}

	/**
	 * {@inheritDoc}
	 */
	public function count(): int
	{
		return count( $this->arrayValidatorMappings );
	}

	/**
	 * {@inheritDoc}
	 */
	public function add( ArrayValidatorMappingInterface ...$arrayValidatorMappings ): void
	{
		foreach ( $arrayValidatorMappings as $arrayValidatorMapping )
		{
			if ( null !== $this->findByKey( $arrayValidatorMapping->getKey() ) )
			{
				throw new ArrayValidatorMappingExistsException(
					sprintf(
						static::ERROR_ARRAY_VALIDATOR_MAPPING_EXISTS,
						$arrayValidatorMapping->getKey()
					)
				);
			}
			$this->arrayValidatorMappings[] = $arrayValidatorMapping;
		}
	}

	/**
	 * {@inheritDoc}
	 */
	public function findByKey( string $key ): ?ArrayValidatorMappingInterface
	{
		foreach ( $this->arrayValidatorMappings as $arrayValidatorMapping )
		{
			if ( $arrayValidatorMapping->getKey() === $key )
			{
				return $arrayValidatorMapping;
			}
		}

		return null;
	}
}
