<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Validators;

use function count;
use function current;
use function in_array;
use function key;
use function next;
use function reset;

/**
 * Represents a validator collection.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class ValidatorCollection implements ValidatorCollectionInterface
{
	/**
	 * Represents the error message if a validator already exists in the collection.
	 * @var string
	 */
	protected const ERROR_VALIDATOR_EXISTS = 'The validator already exists in the collection.';

	/**
	 * Stores the internal list of validators of the collection.
	 * @var ValidatorInterface[]
	 */
	private array $validators = [];

	/**
	 * Constructor method.
	 * @param ValidatorInterface[] $validators The initial validators of the collection.
	 * @throws ValidatorExistsException A validator already exists in the collection.
	 */
	public function __construct( ValidatorInterface ...$validators )
	{
		$this->add( ...$validators );
	}

	/**
	 * {@inheritDoc}
	 */
	public function count(): int
	{
		return count( $this->validators );
	}

	/**
	 * {@inheritDoc}
	 */
	public function current()
	{
		return current( $this->validators );
	}

	/**
	 * {@inheritDoc}
	 */
	public function next(): void
	{
		next( $this->validators );
	}

	/**
	 * {@inheritDoc}
	 */
	public function key()
	{
		return key( $this->validators );
	}

	/**
	 * {@inheritDoc}
	 */
	public function valid(): bool
	{
		return null !== key( $this->validators );
	}

	/**
	 * {@inheritDoc}
	 */
	public function rewind(): void
	{
		reset( $this->validators );
	}

	/**
	 * Adds validators to the collection.
	 * @param ValidatorInterface[] $validators The validators to add.
	 * @throws ValidatorExistsException A validator already exists in the collection.
	 */
	private function add( ValidatorInterface ...$validators ): void
	{
		foreach ( $validators as $validator )
		{
			if ( true === in_array( $validator, $this->validators, true ) )
			{
				throw new ValidatorExistsException( static::ERROR_VALIDATOR_EXISTS );
			}

			$this->validators[] = $validator;
		}
	}

	/**
	 * {@inheritDoc}
	 */
	public function validate( $value ): bool
	{
		foreach ( $this->validators as $validator )
		{
			if ( false === $validator->validate( $value ) )
			{
				return false;
			}
		}

		return true;
	}
}
