<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Http\Responses;

use CodeKandis\Tiphy\Http\Requests\Range;

interface OctetStreamResponderInterface extends ResponderInterface
{
	public function setFileName( string $fileName ): void;

	public function setRange( Range $range ): void;
}
