<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Actions;

interface ActionDispatcherInterface
{
	public function dispatch(): void;
}
