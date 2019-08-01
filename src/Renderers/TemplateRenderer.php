<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Renderers;

use function ob_start;

class TemplateRenderer implements RendererInterface
{
	/** @var TemplateRendererConfigurationInterface */
	private $config;

	/** @var mixed */
	private $data;

	/** @var string */
	private $templatePath;

	public function __construct( TemplateRendererConfigurationInterface $config, $data, string $templatePath )
	{
		$this->config       = $config;
		$this->data         = $data;
		$this->templatePath = $templatePath;
	}

	public function render(): RenderedContentInterface
	{
		ob_start();
		require $this->config->getTemplatesPath() . '/' . $this->templatePath;
		$content = ob_get_clean();

		return new RenderedContent( $content );
	}
}
