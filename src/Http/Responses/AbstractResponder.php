<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Http\Responses;

use function header;
use function http_response_code;
use function sprintf;

abstract class AbstractResponder implements ResponderInterface
{
	/** @var int */
	private $statusCode;

	/** @var mixed */
	private $data;

	private $headers = [];

	public function __construct( int $statusCode, $data )
	{
		$this->statusCode = $statusCode;
		$this->data       = $data;
	}

	/**
	 * @return mixed
	 */
	public function getData()
	{
		return $this->data;
	}

	protected function determineStatusCodeMessage(): string
	{
		$statusMessage             = ( new StatusCodesMessageInterpreter() )
			->interpret( $this->statusCode );
		$responseStatusCodeMessage = sprintf(
			'%s %s',
			$this->statusCode,
			$statusMessage
		);

		return $responseStatusCodeMessage;
	}

	public function addHeader( string $name, string $value ): void
	{
		$this->headers[ $name ] = $value;
	}

	protected function sendStatusCode(): void
	{
		http_response_code( $this->statusCode );
	}

	protected function sendHeaders(): void
	{
		foreach ( $this->headers as $headerName => $headerValue )
		{
			$header = sprintf(
				'%s: %s',
				$headerName,
				$headerValue
			);
			header( $header, true );
		}
	}
}
