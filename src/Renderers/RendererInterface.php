<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Renderers;

/**
 * Represents the interface of any content renderer.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
interface RendererInterface
{
	/**
	 * Renders the content.
	 * @return RenderedContentInterface The rendered content.
	 */
	public function render(): RenderedContentInterface;
}
