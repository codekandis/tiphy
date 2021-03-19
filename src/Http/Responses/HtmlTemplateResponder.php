<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Http\Responses;

use CodeKandis\Tiphy\Http\ContentTypes;
use CodeKandis\Tiphy\Renderers\TemplateRenderer;
use CodeKandis\Tiphy\Renderers\TemplateRendererConfigurationInterface;
use CodeKandis\Tiphy\Throwables\ErrorInformationInterface;

/**
 * Represents a HTML template HTTP responder.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class HtmlTemplateResponder extends AbstractResponder
{
	/**
	 * Stores the template renderer configuration of the HTML template HTTP responder.
	 * @var TemplateRendererConfigurationInterface
	 */
	private TemplateRendererConfigurationInterface $templateRendererConfig;

	/**
	 * Stores the template path of the HTML template HTTP responder.
	 * @var string
	 */
	private string $templatePath;

	/**
	 * Constructor method.
	 * @param TemplateRendererConfigurationInterface $templateRendererConfig The template renderer configuration of the HTML template HTTP responder.
	 * @param int $statusCode The response status code.
	 * @param mixed $data The data of the response.
	 * @param ?ErrorInformationInterface $errorInformation The error information of the response.
	 * @param string $templatePath The template path of the HTML template HTTP responder.
	 */
	public function __construct( TemplateRendererConfigurationInterface $templateRendererConfig, int $statusCode, $data, ?ErrorInformationInterface $errorInformation, string $templatePath )
	{
		parent::__construct( $statusCode, $data, $errorInformation );
		$this->templateRendererConfig = $templateRendererConfig;
		$this->templatePath           = $templatePath;
	}

	/**
	 * {@inheritDoc}
	 */
	public function respond(): void
	{
		$this->sendStatusCode();

		$this->addHeader( Headers::CACHE_CONTROL, 'no-store, no-cache, must-revalidate' );
		$this->addHeader( Headers::CONTENT_TYPE, ContentTypes::TEXT_HTML );

		$renderer        = new TemplateRenderer( $this->templateRendererConfig, $this->data, $this->errorInformation, $this->templatePath );
		$renderedContent = $renderer->render();
		$contentLength   = $renderedContent->getContentLength();

		$this->addHeader( Headers::CONTENT_LENGTH, (string) $contentLength );
		$this->sendHeaders();

		echo $renderedContent->getContent();
	}
}
