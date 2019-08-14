<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Renderers;

use CodeKandis\Tiphy\Throwables\ErrorInformationInterface;
use function json_encode;
use const JSON_PRETTY_PRINT;

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

	public function render(): RenderedContentInterface
	{
		$preparedData = [
			'status' => $this->status,
			'error'  => $this->errorInformation,
			'data'   => $this->data
		];
		$renderedData = json_encode( $preparedData, JSON_PRETTY_PRINT );

		return new RenderedContent( $renderedData );
	}
}
