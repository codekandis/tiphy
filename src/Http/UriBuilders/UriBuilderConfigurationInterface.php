<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Http\UriBuilders;

interface UriBuilderConfigurationInterface
{
	public function getSchema( string $section ): string;

	public function getHost( string $section ): string;

	public function getBaseUri( string $section ): string;

	public function getRelativeUris( string $section ): array;
}
