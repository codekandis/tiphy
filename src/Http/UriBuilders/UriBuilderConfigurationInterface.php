<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Http\UriBuilders;

interface UriBuilderConfigurationInterface
{
	public function getSchema(): string;

	public function getHost(): string;

	public function getBaseUri(): string;

	public function getRelativeUris(): array;
}
