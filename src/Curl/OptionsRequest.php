<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Curl;

use CodeKandis\Tiphy\Http\Requests\Methods;
use Traversable;
use function curl_exec;
use function explode;
use function iterator_to_array;

/**
 * Represents an HTTP `OPTIONS` request.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class OptionsRequest implements OptionsRequestInterface
{
	/**
	 * Stores the URL of the request.
	 * @var string
	 */
	private $uri;

	/**
	 * Constructor method.
	 * @param string $uri The URI of the request.
	 */
	public function __construct( string $uri )
	{
		$this->uri = $uri;
	}

	/**
	 * Fetches the response headers of the request.
	 * @param string $response The response of the request.
	 * @return string[] The response headers of the request.
	 */
	private function fetchFormattedResponse( string $response ): Traversable
	{
		foreach ( explode( "\r\n", $response ) as $lineIndex => $lineFetched )
		{
			if ( false === empty( $lineFetched ) )
			{
				yield $lineFetched;
			}
		}
	}

	/**
	 * {@inheritdoc}
	 */
	public function execute(): array
	{
		$curlHandler = curl_init();
		curl_setopt_array(
			$curlHandler,
			[
				CURLOPT_URL            => $this->uri,
				CURLOPT_CUSTOMREQUEST  => Methods::OPTIONS,
				CURLOPT_HEADER         => true,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_NOBODY         => true
			]
		);
		$response = curl_exec( $curlHandler );
		curl_close( $curlHandler );

		$formattedResponse = $this->fetchFormattedResponse( $response );

		return iterator_to_array( $formattedResponse, false );
	}
}
