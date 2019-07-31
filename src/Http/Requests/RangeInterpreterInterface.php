<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Http\Requests;

interface RangeInterpreterInterface
{
	public function interpret( string $value ): ?Range;
}
