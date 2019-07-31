<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Renderers;

use function ob_start;

class TemplateRenderer implements RendererInterface
{
	/** @var mixed */
	private $data;

	/** @var string */
	private $templatePath;

	public function __construct( $data, string $templatePath )
	{
		$this->data         = $data;
		$this->templatePath = dirname( __DIR__, 2 ) . '/templates/' . $templatePath;
	}

	public function render(): RenderedContentInterface
	{
		ob_start();
		require $this->templatePath;
		$content = ob_get_clean();

		return new RenderedContent( $content );
	}
}
