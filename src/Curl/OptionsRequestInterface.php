<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Curl;

interface OptionsRequestInterface
{
	public function execute(): array;
}
