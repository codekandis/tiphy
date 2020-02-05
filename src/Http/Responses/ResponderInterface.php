<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Http\Responses;

interface ResponderInterface
{
	public function addHeader( string $name, string $value ): void;

	public function respond(): void;
}
