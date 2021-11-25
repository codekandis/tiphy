<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Data;

use CodeKandis\Entities\EntityInterface;
use function array_key_exists;
use function count;
use function current;
use function key;
use function next;
use function reset;
use function sprintf;

/**
 * Represents an array accessor managing an array by reference.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class ArrayAccessor implements ArrayAccessorInterface
{
	/**
	 * Represents the error message if a key does not exist.
	 * @var string
	 */
	protected const ERROR_INDEX_DOES_NOT_EXIST = 'The index \'%s\' does not exist.';

	/**
	 * Stores the array to access.
	 * @var mixed[]
	 */
	private array $data;

	/**
	 * Constructor method.
	 * @param mixed[] $data The array to access.
	 */
	public function __construct( array &$data )
	{
		$this->data = &$data;
	}

	/**
	 * {@inheritDoc}
	 */
	public function count(): int
	{
		return count( $this->data );
	}

	/**
	 * {@inheritDoc}
	 */
	public function current(): EntityInterface
	{
		return current( $this->data );
	}

	/**
	 * {@inheritDoc}
	 */
	public function next(): void
	{
		next( $this->data );
	}

	/**
	 * {@inheritDoc}
	 */
	public function key()
	{
		return key( $this->data );
	}

	/**
	 * {@inheritDoc}
	 */
	public function valid(): bool
	{
		return null !== key( $this->data );
	}

	/**
	 * {@inheritDoc}
	 */
	public function rewind(): void
	{
		reset( $this->data );
	}

	/**
	 * {@inheritDoc}
	 */
	public function offsetExists( $index ): bool
	{
		return $this->has( $index );
	}

	/**
	 * {@inheritDoc}
	 */
	public function offsetGet( $index )
	{
		return $this->get( $index );
	}

	/**
	 * {@inheritDoc}
	 */
	public function offsetSet( $index, $value ): void
	{
		$this->set( $index, $value );
	}

	/**
	 * {@inheritDoc}
	 */
	public function offsetUnset( $index ): void
	{
		$this->unset( $index );
	}

	/**
	 * {@inheritDoc}
	 */
	public function has( $index ): bool
	{
		return array_key_exists( $index, $this->data );
	}

	/**
	 * {@inheritDoc}
	 */
	public function get( $index )
	{
		if ( false === array_key_exists( $index, $this->data ) )
		{
			throw new ArrayIndexNotFoundException(
				sprintf(
					static::ERROR_INDEX_DOES_NOT_EXIST,
					$index
				)
			);
		}

		return $this->data[ $index ];
	}

	/**
	 * {@inheritDoc}
	 */
	public function getDefaulted( $index, $default )
	{
		return false === array_key_exists( $index, $this->data )
			? $default
			: $this->data[ $index ];
	}

	/**
	 * {@inheritDoc}
	 */
	public function set( $index, $value ): void
	{
		$data           = &$this->data;
		$data[ $index ] = $value;
	}

	/**
	 * {@inheritDoc}
	 */
	public function unset( $index ): void
	{
		if ( false === array_key_exists( $index, $this->data ) )
		{
			throw new ArrayIndexNotFoundException(
				sprintf(
					static::ERROR_INDEX_DOES_NOT_EXIST,
					$index
				)
			);
		}

		$data = &$this->data;
		unset ( $data[ $index ] );
	}

	/**
	 * {@inheritDoc}
	 */
	public function toArray(): array
	{
		return $this->data;
	}

	/**
	 * {@inheritDoc}
	 */
	public function jsonSerialize(): array
	{
		return $this->data;
	}
}
