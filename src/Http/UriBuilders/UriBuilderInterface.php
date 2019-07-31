<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Http\UriBuilders;

interface UriBuilderInterface
{
	public function getUri( string $uriName, string... $arguments ): string;
}
