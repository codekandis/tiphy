<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Curl;

class ResponseHeaders implements ResponseHeadersInterface
{
	/** @var string */
	private $statusLine;

	/** @var string[] */
	private $responseHeaders;

	/**
	 * @param string[] $formattedResponse
	 */
	public function __construct( array $formattedResponse )
	{
		$this->parseResponse( $formattedResponse );
	}

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

	public function getHeader( string $headerName ): string
	{
		return $this->responseHeaders[ $headerName ] ?? '';
	}
}
