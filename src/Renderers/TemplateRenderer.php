<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Renderers;

use CodeKandis\Tiphy\Throwables\ErrorInformationInterface;
use function ob_start;

class TemplateRenderer implements RendererInterface
{
	/** @var TemplateRendererConfigurationInterface */
	private $config;

	/** @var mixed */
	private $data;

	/** @var ?ErrorInformationInterface */
	private $errorInformation;

	/** @var string */
	private $templatePath;

	public function __construct( TemplateRendererConfigurationInterface $config, $data, ?ErrorInformationInterface $errorInformation, string $templatePath )
	{
		$this->config           = $config;
		$this->data             = $data;
		$this->errorInformation = $errorInformation;
		$this->templatePath     = $templatePath;
	}

	public function render(): RenderedContentInterface
	{
		ob_start();
		require $this->config->getTemplatesPath() . '/' . $this->templatePath;
		$content = ob_get_clean();

		return new RenderedContent( $content );
	}
}
