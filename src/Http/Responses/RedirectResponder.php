<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Http\Responses;

/**
 * Represents a redirect HTTP responder.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class RedirectResponder extends AbstractResponder
{
	/**
	 * Stores the URI to redirect to.
	 * @var string
	 */
	private string $uri;

	/**
	 * Constructor method.
	 * @param string $uri The URI to redirect to.
	 * @param int $statusCode The response status code.
	 */
	public function __construct( string $uri, int $statusCode )
	{
		parent::__construct( $statusCode, null );

		$this->uri = $uri;
	}

	/**
	 * {@inheritDoc}
	 */
	public function respond(): void
	{
		$this->sendStatusCode();

		$this->removeHeader( Headers::CONTENT_TYPE );
		$this->removeHeader( Headers::CONTENT_LENGTH );
		$this->addHeader( Headers::LOCATION, $this->uri );
		$this->sendHeaders();
	}
}
