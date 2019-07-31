<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Renderers;

interface RenderedContentInterface
{
	public function getContentLength(): int;

	public function getContent(): string;
}
