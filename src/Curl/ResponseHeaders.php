<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Curl;

use function explode;

/**
 * Represents response headers.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class ResponseHeaders implements ResponseHeadersInterface
{
	/**
	 * Stores the status of the response.
	 * @var string
	 */
	private string $statusLine;

	/**
	 * Stores the headers of the response.
	 * @var string[]
	 */
	private array $responseHeaders;

	/**
	 * Constructor methos.
	 * @param string[] $formattedResponse The formatted response to parse.
	 */
	public function __construct( array $formattedResponse )
	{
		$this->parseResponse( $formattedResponse );
	}

	/**
	 * Parses the formatted response.
	 * @param string[] $formattedResponse The formatted response to parse.
	 */
	private function parseResponse( array $formattedResponse ): void
	{
		foreach ( $formattedResponse as $responseLineIndex => $responseLineFetched )
		{
			if ( 0 === $responseLineIndex )
			{
				$this->statusLine = $responseLineFetched;
				continue;
			}
			[
				$headerName,
				$headerValue
			] = explode( ': ', $responseLineFetched );
			$this->responseHeaders[ $headerName ] = $headerValue;
		}
	}

	/**
	 * {@inheritDoc}
	 */
	public function getHeader( string $headerName ): string
	{
		return $this->responseHeaders[ $headerName ] ?? '';
	}
}
