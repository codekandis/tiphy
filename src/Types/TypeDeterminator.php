<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Types;

use function get_class;
use function gettype;
use function is_object;

/**
 * Represents a type determinator.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class TypeDeterminator implements TypeDeterminatorInterface
{
	/**
	 * Stores if the determined types has to be strict native.
	 * @var bool
	 */
	private bool $strict;

	/**
	 * Constructor method.
	 * @param bool $strict True if the determined types has to be strict native, otherwise false.
	 */
	public function __construct( bool $strict )
	{
		$this->strict = $strict;
	}

	/**
	 * Determines the strict native type of a value.
	 * @param mixed $value The value to determine its type.
	 * @return string The determined type.
	 */
	private function determineStrict( $value ): string
	{
		return gettype( $value );
	}

	/**
	 * Determines the loose type of a value.
	 * @param mixed $value The value to determine its type.
	 * @return string The determined type.
	 */
	private function determineLoose( $value ): string
	{
		if ( true === is_object( $value ) )
		{
			return get_class( $value );
		}

		$determinedType = gettype( $value );
		switch ( $determinedType )
		{
			case 'unknown type':
			{
				$determinedType = 'unkown';
				break;
			}
			case 'NULL':
			{
				$determinedType = 'null';
				break;
			}
			case 'resource':
			{
				$determinedType = 'resource';
				break;
			}
			case 'resource (closed)':
			{
				$determinedType = 'unknown';
				break;
			}
			case 'double':
			{
				$determinedType = 'float';
				break;
			}
			case 'boolean':
			{
				$determinedType = 'bool';
				break;
			}
			case 'integer':
			{
				$determinedType = 'int';
				break;
			}
		}

		return $determinedType;
	}

	/**
	 * {@inheritDoc}
	 */
	public function determine( $value ): string
	{
		return true === $this->strict
			? $this->determineStrict( $value )
			: $this->determineLoose( $value );
	}
}
