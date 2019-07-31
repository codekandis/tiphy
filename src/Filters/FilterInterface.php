<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Filters;

interface FilterInterface
{
	public function filter(): bool;
}
