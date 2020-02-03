<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Curl;

use CodeKandis\Tiphy\Http\Requests\Methods;
use Traversable;
use function curl_exec;
use function explode;
use function iterator_to_array;

class OptionsRequest implements OptionsRequestInterface
{
	/** @var string */
	private $uri;

	public function __construct( string $uri )
	{
		$this->uri = $uri;
	}

	/**
	 * @return string[]
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

		return iterator_to_array( $formattedResponse );
	}
}
