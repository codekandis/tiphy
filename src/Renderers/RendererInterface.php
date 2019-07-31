<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Renderers;

interface RendererInterface
{
	public function render(): RenderedContentInterface;
}
