<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Validators\ArrayValidators;

use function array_key_exists;

/**
 * Represents an mapped array validator.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class MappedArrayValidator implements MappedArrayValidatorInterface
{
	/**
	 * Represents the error message if an array key does not exist.
	 * @var string
	 */
	protected const ERROR_ARRAY_KEY_NOT_FOUND = 'The array key `%s` does not exist.';

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
		if ( false === is_array( $value ) )
		{
			return false;
		}

		$isValid = true;

		foreach ( $this->arrayValidatorMappings as $arrayValidatorMapping )
		{
			$key = $arrayValidatorMapping->getKey();
			if ( false === array_key_exists( $key, $value ) )
			{
				throw new ArrayKeyNotFoundException(
					sprintf(
						static::ERROR_ARRAY_KEY_NOT_FOUND,
						$key
					)
				);
			}

			$isValid = $isValid && $arrayValidatorMapping->getValidator()->validate( $value[ $key ] );

			if ( false === $isValid )
			{
				return false;
			}
		}

		return $isValid;
	}
}
