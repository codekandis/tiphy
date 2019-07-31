<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Renderers;

use function strlen;

class RenderedContent implements RenderedContentInterface
{
	/** @var int */
	private $contentLength;

	/** @var string */
	private $content;

	public function __construct( string $content )
	{
		$this->contentLength = strlen( $content );
		$this->content       = $content;
	}

	public function getContentLength(): int
	{
		return $this->contentLength;
	}

	public function getContent(): string
	{
		return $this->content;
	}
}
