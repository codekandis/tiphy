<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Persistence\MariaDb\Repositories;

use CodeKandis\Tiphy\Persistence\MariaDb\ConnectorInterface;

/**
 * Represents the base class of all MariaDb repositories.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
abstract class AbstractRepository
{
	/**
	 * Stores the MariaDb database connector.
	 * @var ConnectorInterface
	 */
	protected ConnectorInterface $databaseConnector;

	/**
	 * Constructor method.
	 * @param ConnectorInterface $connector The MariaDb database connector.
	 */
	public function __construct( ConnectorInterface $connector )
	{
		$this->databaseConnector = $connector;
	}
}
