<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Renderers;

/**
 * Represents the interface of any rendered content.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
interface RenderedContentInterface
{
	/**
	 * Gets the length of the rendered content.
	 * @return int The length of the rendered content.
	 */
	public function getContentLength(): int;

	/**
	 * Gets the rendered content.
	 * @return string The rendered content.
	 */
	public function getContent(): string;
}
