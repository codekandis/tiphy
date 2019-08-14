<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Http\Responses;

use CodeKandis\Tiphy\Http\ContentTypes;
use CodeKandis\Tiphy\Renderers\TemplateRenderer;
use CodeKandis\Tiphy\Renderers\TemplateRendererConfigurationInterface;

class HtmlTemplateResponder extends AbstractResponder
{
	/** @var TemplateRendererConfigurationInterface */
	private $templateRendererConfig;

	/** @var string */
	private $templatePath;

	public function __construct( TemplateRendererConfigurationInterface $templateRendererConfig, int $statusCode, $data, string $templatePath )
	{
		parent::__construct( $statusCode, $data );
		$this->templateRendererConfig = $templateRendererConfig;
		$this->templatePath           = $templatePath;
	}

	public function respond(): void
	{
		$this->sendStatusCode();

		$this->addHeader( Headers::CACHE_CONTROL, 'no-store, no-cache, must-revalidate' );
		$this->addHeader( Headers::CONTENT_TYPE, ContentTypes::TEXT_HTML );

		$renderer        = new TemplateRenderer( $this->templateRendererConfig, $this->data, $this->templatePath );
		$renderedContent = $renderer->render();
		$contentLength   = $renderedContent->getContentLength();

		$this->addHeader( Headers::CONTENT_LENGTH, (string) $contentLength );
		$this->sendHeaders();

		echo $renderedContent->getContent();
	}
}
