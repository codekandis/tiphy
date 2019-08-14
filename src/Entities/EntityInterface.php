<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Entities;

use JsonSerializable;
use ReflectionException;

interface EntityInterface extends JsonSerializable
{
	/**
	 * @throws ReflectionException
	 */
	public function toArray(): array;

	/**
	 * @throws ReflectionException
	 */
	public static function fromArray( array $data ): EntityInterface;

	/**
	 * @throws ReflectionException
	 */
	public static function fromObject( object $data ): EntityInterface;
}
