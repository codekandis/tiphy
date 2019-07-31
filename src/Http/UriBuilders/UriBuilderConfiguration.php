<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Http\UriBuilders;

use function dirname;

class UriBuilderConfiguration implements UriBuilderConfigurationInterface
{
	/** @var array */
	private $data;

	public function __construct()
	{
		$this->data = require dirname( __DIR__, 3 ) . '/config/uriBuilder.php';
	}

	public function getSchema( string $section ): string
	{
		return $this->data[ $section ][ 'schema' ];
	}

	public function getHost( string $section ): string
	{
		return $this->data[ $section ][ 'host' ];
	}

	public function getBaseUri( string $section ): string
	{
		return $this->data[ $section ][ 'baseUri' ];
	}

	public function getRelativeUris( string $section ): array
	{
		return $this->data[ $section ][ 'relativeUris' ];
	}
}
