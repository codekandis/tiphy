<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Renderers;

use CodeKandis\Tiphy\Throwables\ErrorInformationInterface;
use function ob_start;

/**
 * Represents a template content renderer.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class TemplateRenderer implements RendererInterface
{
	/**
	 * Stores the template renderer configuration.
	 * @var TemplateRendererConfigurationInterface
	 */
	private $config;

	/**
	 * Stores the data to render.
	 * @var mixed
	 */
	private $data;

	/**
	 * Stores the error information of the response.
	 * @var ?ErrorInformationInterface
	 */
	private $errorInformation;

	/**
	 * Stores the path of the template.
	 * @var string
	 */
	private $templatePath;

	/**
	 * Constructor method.
	 * @param TemplateRendererConfigurationInterface $config The template renderer configuration.
	 * @param mixed $data The data to render.
	 * @param ?ErrorInformationInterface $errorInformation The error information of the response.
	 * @param string $templatePath The path of the template.
	 */
	public function __construct( TemplateRendererConfigurationInterface $config, $data, ?ErrorInformationInterface $errorInformation, string $templatePath )
	{
		$this->config           = $config;
		$this->data             = $data;
		$this->errorInformation = $errorInformation;
		$this->templatePath     = $templatePath;
	}

	/**
	 * {@inheritdoc}
	 */
	public function render(): RenderedContentInterface
	{
		ob_start();
		require $this->config->getTemplatesPath() . '/' . $this->templatePath;
		$content = ob_get_clean();

		return new RenderedContent( $content );
	}
}
