<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Configurations;

/**
 * Represents the base class of all configurations.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class AbstractConfiguration
{
	/**
	 * Stores the data of the configuration.
	 * @var array
	 */
	protected $data;

	/**
	 * Constructor method.
	 * @param string $path The path to the configuration file.
	 */
	public function __construct( string $path )
	{
		$this->data = require $path;
	}
}
