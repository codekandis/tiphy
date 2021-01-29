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
	protected array $data;

	/**
	 * Constructor method.
	 * @param array $data The plain configuration data.
	 */
	public function __construct( array $data )
	{
		$this->data = $data;
	}
}
