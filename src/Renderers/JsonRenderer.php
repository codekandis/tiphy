<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Renderers;

use function json_encode;
use const JSON_PRETTY_PRINT;

class JsonRenderer implements RendererInterface
{
	/** @var string */
	private $status;

	/** @var mixed */
	private $data;

	public function __construct( string $status, $data )
	{
		$this->status = $status;
		$this->data   = $data;
	}

	public function render(): RenderedContentInterface
	{
		$preparedData = [
			'status' => $this->status,
			'data'   => $this->data,
		];
		$renderedData = json_encode( $preparedData, JSON_PRETTY_PRINT );

		return new RenderedContent( $renderedData );
	}
}
