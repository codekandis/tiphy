<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Renderers;

use CodeKandis\Tiphy\Configurations\AbstractConfiguration;

/**
 * Represents a template renderer configuration.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class TemplateRendererConfiguration extends AbstractConfiguration implements TemplateRendererConfigurationInterface
{
	/**
	 * {@inheritDoc}
	 */
	public function getTemplatesPath(): string
	{
		return $this->data[ 'templatesPath' ];
	}
}
