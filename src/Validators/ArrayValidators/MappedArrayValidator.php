<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Validators\ArrayValidators;

/**
 * Represents an mapped array validator.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class MappedArrayValidator implements MappedArrayValidatorInterface
{
	/**
	 * Gets the array validator mappings of the array.
	 * @var ArrayValidatorMappingsInterface
	 */
	private ArrayValidatorMappingsInterface $arrayValidatorMappings;

	/**
	 * Constructor method.
	 * @param ArrayValidatorMappingsInterface $arrayValidatorMappings The array validator mappings of the array.
	 */
	public function __construct( ArrayValidatorMappingsInterface $arrayValidatorMappings )
	{
		$this->arrayValidatorMappings = $arrayValidatorMappings;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getArrayValidatorMappings(): ArrayValidatorMappingsInterface
	{
		return $this->arrayValidatorMappings;
	}

	/**
	 * {@inheritDoc}
	 */
	public function validate( $value ): bool
	{
		$isValid = true;

		foreach ( $value as $key => $arrayValue )
		{
			$arrayValidatorMapping = $this->arrayValidatorMappings->findByKey( $key );

			if ( null === $arrayValidatorMapping )
			{
				continue;
			}

			$isValid = $isValid && $arrayValidatorMapping->getValidator()->validate( $arrayValue );

			if ( false === $isValid )
			{
				break;
			}
		}

		return $isValid;
	}
}
