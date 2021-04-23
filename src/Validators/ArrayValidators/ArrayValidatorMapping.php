<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Validators\ArrayValidators;

use CodeKandis\Tiphy\Validators\ValidatorInterface;

/**
 * Represents an entity property mapping.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class ArrayValidatorMapping implements ArrayValidatorMappingInterface
{
	/**
	 * Stores the array key to validate its array value.
	 * @var string
	 */
	private string $key;

	/**
	 * Stores the validator of the array value.
	 * @var ValidatorInterface
	 */
	private ValidatorInterface $validator;

	/**
	 * Constructor method.
	 * @param string $key The array key to validate its array value.
	 * @param ValidatorInterface $validator The validator of the array value.
	 */
	public function __construct( string $key, ValidatorInterface $validator )
	{
		$this->key       = $key;
		$this->validator = $validator;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getKey(): string
	{
		return $this->key;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getValidator(): ValidatorInterface
	{
		return $this->validator;
	}
}
