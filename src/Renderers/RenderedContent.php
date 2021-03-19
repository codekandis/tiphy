<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Renderers;

use function strlen;

/**
 * Represents a rendered content.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class RenderedContent implements RenderedContentInterface
{
	/**
	 * Stores the length of the rendered content.
	 * @var int
	 */
	private int $contentLength;

	/**
	 * Stores the rendered content.
	 * @var string
	 */
	private string $content;

	/**
	 * Constructor method.
	 * @param string $content The content to render.
	 */
	public function __construct( string $content )
	{
		$this->contentLength = strlen( $content );
		$this->content       = $content;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getContentLength(): int
	{
		return $this->contentLength;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getContent(): string
	{
		return $this->content;
	}
}
