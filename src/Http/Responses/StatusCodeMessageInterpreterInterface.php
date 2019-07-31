<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Http\Responses;

interface StatusCodeMessageInterpreterInterface
{
	public function interpret( int $statusCode ): string;
}
