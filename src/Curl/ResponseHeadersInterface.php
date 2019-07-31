<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Curl;

interface ResponseHeadersInterface
{
	public function getHeader( string $headerName ): string;
}
