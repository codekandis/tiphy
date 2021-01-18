<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Http\Responses;

use CodeKandis\Tiphy\Throwables\ErrorInformationInterface;
use function header;
use function http_response_code;
use function sprintf;

/**
 * Represents the base class of all HTTP responders.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
abstract class AbstractResponder implements ResponderInterface
{
	/**
	 * Stores the status code of the response.
	 * @var int
	 */
	private int $statusCode;

	/**
	 * Stores the error information of the response.
	 * @var null|ErrorInformationInterface
	 */
	protected ?ErrorInformationInterface $errorInformation;

	/**
	 * Stores the data of the response.
	 * @var mixed
	 */
	protected $data;

	/**
	 * Stores the headers of the response.
	 * @var string[]
	 */
	private $headers = [];

	/**
	 * Constructor method.
	 * @param int $statusCode The status code of the response.
	 * @param mixed $data The data of the response.
	 * @param null|ErrorInformationInterface $errorInformation The error information of the response.
	 */
	public function __construct( int $statusCode, $data, ?ErrorInformationInterface $errorInformation = null )
	{
		$this->statusCode       = $statusCode;
		$this->errorInformation = $errorInformation;
		$this->data             = $data;
	}

	/**
	 * Determines the status message of the response.
	 * @return string The status message of the response.
	 */
	protected function determineStatusCodeMessage(): string
	{
		$statusMessage = ( new StatusCodesMessageTranslator() )
			->translate( $this->statusCode );

		return sprintf(
			'%s %s',
			$this->statusCode,
			$statusMessage
		);
	}

	/**
	 * Adds a response header.
	 * @param string $name The name of the response header.
	 * @param string $value The value of the response header.
	 */
	public function addHeader( string $name, string $value ): void
	{
		$this->headers[ $name ] = $value;
	}

	/**
	 * Sends the status code of the response.
	 */
	protected function sendStatusCode(): void
	{
		http_response_code( $this->statusCode );
	}

	/**
	 * Sends the headers of the response.
	 */
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
