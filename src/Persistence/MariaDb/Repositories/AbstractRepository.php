<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Persistence\MariaDb\Repositories;

use Closure;
use CodeKandis\Tiphy\Persistence\MariaDb\ConnectorInterface;
use CodeKandis\Tiphy\Persistence\MariaDb\StatementExecutionFailedException;

/**
 * Represents the base class of all MariaDB repositories.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
abstract class AbstractRepository implements RepositoryInterface
{
	/**
	 * Stores the MariaDb database connector.
	 * @var ConnectorInterface
	 */
	protected ConnectorInterface $databaseConnector;

	/**
	 * Constructor method.
	 * @param ConnectorInterface $connector The MariaDB database connector.
	 */
	public function __construct( ConnectorInterface $connector )
	{
		$this->databaseConnector = $connector;
	}

	/**
	 * @inheritDoc
	 */
	public function asTransaction( Closure $closure, array...$arguments )
	{
		try
		{
			$this->databaseConnector->beginTransaction();
			$returnValue = $closure( ...$arguments );
			$this->databaseConnector->commit();
		}
		catch ( StatementExecutionFailedException $exception )
		{
			$this->databaseConnector->rollback();
			throw $exception;
		}

		return $returnValue;
	}
}
