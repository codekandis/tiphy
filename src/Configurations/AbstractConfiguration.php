<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Configurations;

class AbstractConfiguration
{
	/** @var array */
	protected $data;

	public function __construct( string $path )
	{
		$this->data = require $path;
	}
}
