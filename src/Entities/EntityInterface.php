<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Entities;

use JsonSerializable;

interface EntityInterface extends JsonSerializable
{
	public function toArray(): array;
}
