<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Renderers;

use CodeKandis\Tiphy\Configurations\AbstractConfiguration;

class TemplateRendererConfiguration extends AbstractConfiguration implements TemplateRendererConfigurationInterface
{
	public function getTemplatesPath(): string
	{
		return $this->data[ 'templatesPath' ];
	}
}
