<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Http\Responses;

use CodeKandis\Tiphy\Http\ContentTypes;
use CodeKandis\Tiphy\Renderers\TemplateRenderer;
use ReflectionException;

class HtmlTemplateResponder extends AbstractResponder
{
	/** @var string */
	private $templatePath;

	public function __construct( int $statusCode, $data, string $templatePath )
	{
		parent::__construct( $statusCode, $data );
		$this->templatePath = $templatePath;
	}

	private function getTemplatePath(): string
	{
		return $this->templatePath;
	}

	/**
	 * @throws ReflectionException
	 */
	public function respond(): void
	{
		$this->sendStatusCode();

		$this->addHeader( Headers::CACHE_CONTROL, 'no-store, no-cache, must-revalidate' );
		$this->addHeader( Headers::CONTENT_TYPE, ContentTypes::TEXT_HTML );

		$data            = $this->getData();
		$renderer        = new TemplateRenderer( $data, $this->templatePath );
		$renderedContent = $renderer->render();
		$contentLength   = $renderedContent->getContentLength();

		$this->addHeader( Headers::CONTENT_LENGTH, (string) $contentLength );
		$this->sendHeaders();

		echo $renderedContent->getContent();
	}
}
