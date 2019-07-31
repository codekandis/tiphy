<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Http\Responses;

use CodeKandis\Tiphy\Http\ContentTypes;
use CodeKandis\Tiphy\Renderers\JsonRenderer;
use ReflectionException;

class JsonResponder extends ResponderAbstract
{
	/**
	 * @throws ReflectionException
	 */
	public function respond(): void
	{
		$this->sendStatusCode();

		$this->addHeader( Headers::ACCESS_CONTROL_ALLOW_ORIGIN, '*' );
		$this->addHeader( Headers::CACHE_CONTROL, 'no-store, no-cache, must-revalidate' );
		$this->addHeader( Headers::CONTENT_TYPE, ContentTypes::APPLICATION_JSON );

		$statusCodeMessage = $this->determineStatusCodeMessage();
		$data              = $this->getData();
		$renderer          = new JsonRenderer( $statusCodeMessage, $data );
		$renderedContent   = $renderer->render();
		$contentLength     = $renderedContent->getContentLength();

		$this->addHeader( Headers::CONTENT_LENGTH, (string) $contentLength );
		$this->sendHeaders();

		echo $renderedContent->getContent();
	}
}
