<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Renderers;

interface TemplateRendererConfigurationInterface
{
	public function getTemplatesPath(): string;
}
