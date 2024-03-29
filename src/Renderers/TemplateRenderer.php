<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Renderers;

use CodeKandis\Tiphy\Configurations\TemplateRendererConfigurationInterface;
use CodeKandis\Tiphy\Throwables\ErrorInformationInterface;
use function ob_get_clean;
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
	private TemplateRendererConfigurationInterface $configuration;

	/**
	 * Stores the data to render.
	 * @var mixed
	 */
	private $data;

	/**
	 * Stores the error information of the response.
	 * @var ?ErrorInformationInterface
	 */
	private ?ErrorInformationInterface $errorInformation;

	/**
	 * Stores the path of the template.
	 * @var string
	 */
	private string $templatePath;

	/**
	 * Constructor method.
	 * @param TemplateRendererConfigurationInterface $configuration The template renderer configuration.
	 * @param mixed $data The data to render.
	 * @param ?ErrorInformationInterface $errorInformation The error information of the response.
	 * @param string $templatePath The path of the template.
	 */
	public function __construct( TemplateRendererConfigurationInterface $configuration, $data, ?ErrorInformationInterface $errorInformation, string $templatePath )
	{
		$this->configuration    = $configuration;
		$this->data             = $data;
		$this->errorInformation = $errorInformation;
		$this->templatePath     = $templatePath;
	}

	/**
	 * {@inheritDoc}
	 */
	public function render(): RenderedContentInterface
	{
		ob_start();
		require $this->configuration->getTemplatesPath() . '/' . $this->templatePath;
		$content = ob_get_clean();

		return new RenderedContent( $content );
	}
}
