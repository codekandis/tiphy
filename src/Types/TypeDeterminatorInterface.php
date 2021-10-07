<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Types;

/**
 * Represents the interface of any type determinator.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
interface TypeDeterminatorInterface
{
	/**
	 * Determines the type of a value.
	 * @param mixed $value The value to determine its type.
	 * @return string The determined type.
	 */
	public function determine( $value ): string;
}
