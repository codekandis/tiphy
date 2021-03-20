<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Http\Responses;

use CodeKandis\Tiphy\Http\ContentTypes;
use CodeKandis\Tiphy\Renderers\JsonRenderer;
use JsonException;

/**
 * Represents a JSON HTTP responder.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class JsonResponder extends AbstractResponder
{
	/**
	 * {@inheritDoc}
	 * @throws JsonException An error occurred during the creation of the JSON response.
	 */
	public function respond(): void
	{
		$this->sendStatusCode();

		$this->addHeader( Headers::ACCESS_CONTROL_ALLOW_ORIGIN, '*' );
		$this->addHeader( Headers::CACHE_CONTROL, 'no-store, no-cache, must-revalidate' );
		$this->addHeader( Headers::CONTENT_TYPE, ContentTypes::APPLICATION_JSON );

		$statusCodeMessage = $this->determineStatusCodeMessage();
		$renderer          = new JsonRenderer( $statusCodeMessage, $this->data, $this->errorInformation );
		$renderedContent   = $renderer->render();
		$contentLength     = $renderedContent->getContentLength();

		$this->addHeader( Headers::CONTENT_LENGTH, (string) $contentLength );
		$this->sendHeaders();

		echo $renderedContent->getContent();
	}
}
