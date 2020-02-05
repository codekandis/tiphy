<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Renderers;

/**
 * Represents the interface of all template renderer configurations.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
interface TemplateRendererConfigurationInterface
{
	/**
	 * Gets the path of the template.
	 * @return string The path of the template.
	 */
	public function getTemplatesPath(): string;
}
