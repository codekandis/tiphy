<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Http;

interface RoutesConfigurationInterface
{
	public function getHosts(): array;

	public function getRoutes( string $host ): array;
}
