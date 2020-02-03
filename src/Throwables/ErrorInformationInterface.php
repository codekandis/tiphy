<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Throwables;

use JsonSerializable;
use ReflectionException;

/**
 * Represents the interface of all error informations.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
interface ErrorInformationInterface extends JsonSerializable
{
	/**
	 * Converts the error information into an array.
	 * @return array The error information as an array.
	 * @throws ReflectionException An error occurred during the conversion.
	 */
	public function toArray(): array;
}
