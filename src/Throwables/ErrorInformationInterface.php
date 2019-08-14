<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Throwables;

use JsonSerializable;
use ReflectionException;

interface ErrorInformationInterface extends JsonSerializable
{
	/**
	 * @throws ReflectionException
	 */
	public function toArray(): array;
}
