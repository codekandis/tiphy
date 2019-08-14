<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Renderers;

use CodeKandis\JsonCodec\JsonEncoder;
use CodeKandis\Tiphy\Throwables\ErrorInformationInterface;
use JsonException;

class JsonRenderer implements RendererInterface
{
	/** @var string */
	private $status;

	/** @var mixed */
	private $data;

	/** @var ?ErrorInformationInterface */
	private $errorInformation;

	public function __construct( string $status, $data, ?ErrorInformationInterface $errorInformation )
	{
		$this->status           = $status;
		$this->data             = $data;
		$this->errorInformation = $errorInformation;
	}

	/**
	 * @throws JsonException
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
