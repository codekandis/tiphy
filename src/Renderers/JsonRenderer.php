<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Renderers;

use CodeKandis\JsonCodec\JsonEncoder;
use CodeKandis\Tiphy\Throwables\ErrorInformationInterface;
use JsonException;

/**
 * Represents a JSON content renderer.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class JsonRenderer implements RendererInterface
{
	/**
	 * Stores the response status.
	 * @var string
	 */
	private $status;

	/**
	 * Stores the data to render.
	 * @var mixed
	 */
	private $data;

	/**
	 * Stores the error information of the response.
	 * @var ?ErrorInformationInterface
	 */
	private $errorInformation;

	/**
	 * Constructor method.
	 * @param string $status The response status.
	 * @param mixed $data The data to render.
	 * @param ?ErrorInformationInterface $errorInformation The error information of the response.
	 */
	public function __construct( string $status, $data, ?ErrorInformationInterface $errorInformation )
	{
		$this->status           = $status;
		$this->data             = $data;
		$this->errorInformation = $errorInformation;
	}

	/**
	 * {@inheritdoc}
	 * @throws JsonException An error occurred during the rendering of the JSON response.
	 */
	public function render(): RenderedContentInterface
	{
		$preparedData = [
			'status' => $this->status,
			'error'  => $this->errorInformation,
			'data'   => $this->data
		];
		$renderedData = ( new JsonEncoder() )
			->encode( $preparedData );

		return new RenderedContent( $renderedData );
	}
}
