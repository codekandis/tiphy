<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Persistence\MariaDb\Repositories;

use CodeKandis\Tiphy\Persistence\MariaDb\ConnectorInterface;

abstract class AbstractRepository
{
	/** @var ConnectorInterface */
	protected $databaseConnector;

	public function __construct( ConnectorInterface $connector )
	{
		$this->databaseConnector = $connector;
	}
}
