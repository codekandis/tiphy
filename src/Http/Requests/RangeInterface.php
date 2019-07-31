<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Http\Requests;

interface RangeInterface
{
	public function getOffsetStart(): ?int;

	public function getOffsetEnd(): ?int;

	public function getType(): int;

	public function isValid( int $size ): bool;
}
