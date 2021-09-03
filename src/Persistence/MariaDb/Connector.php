<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Persistence\MariaDb;

use CodeKandis\Tiphy\Entities\EntityInterface;
use CodeKandis\Tiphy\Entities\EntityPropertyMappings\EntityPropertyMapperInterface;
use CodeKandis\Tiphy\Persistence\PersistenceConfigurationInterface;
use PDO;
use PDOException;
use PDOStatement;
use stdClass;
use function count;
use function sprintf;

/**
 * Represents a MariaDb database connector.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class Connector implements ConnectorInterface
{
	/**
	 * Represents the error message if a database connection failed.
	 * @var string
	 */
	protected const ERROR_CONNECTION_FAILED = 'The database connection failed.';

	/**
	 * Represents the error message if a transaction failed to start.
	 * @var string
	 */
	protected const ERROR_TRANSACTION_START_FAILED = 'The transaction start failed.';

	/**
	 * Represents the error message if a transaction failed to rollback.
	 * @var string
	 */
	protected const ERROR_TRANSACTION_ROLLBACK_FAILED = 'The transaction rollback failed.';

	/**
	 * Represents the error message if a transaction failed to commit.
	 * @var string
	 */
	protected const ERROR_TRANSACTION_COMMIT_FAILED = 'The transaction commit failed.';

	/**
	 * Represents the error message if the preparation of a statement failed.
	 * @var string
	 */
	protected const ERROR_STATEMENT_PREPARATION_FAILED = 'The preparation of the statement failed.';

	/**
	 * Represents the error message if a number of argument lists does not match a number of statements.
	 * @var string
	 */
	protected const ERROR_INVALID_ARGUMENTS_STATEMENTS_COUNT = 'The number of argument lists `%d` does not match the number of statements `%d`.';

	/**
	 * Represents the error message if the execution of a statement failed.
	 * @var string
	 */
	protected const ERROR_EXECUTION_OF_STATEMENT_FAILED = '[%s] The execution of the statement failed. %s: %s';

	/**
	 * Represents the error message if the setting of the fetch mode of a statement failed.
	 * @var string
	 */
	protected const ERROR_SETTING_FETCHMODE_FAILED = 'The setting of the fetch mode of the statement failed.';

	/**
	 * Represents the error message if the fetching of a statement result failed.
	 * @var string
	 */
	protected const ERROR_FETCHING_RESULT_FAILED = 'The fetching of the statment result failed.';

	/**
	 * Represents the error message if the retrieval of the last inserted ID failed.
	 * @var string
	 */
	protected const ERROR_RETRIEVING_LAST_INSERTED_ID_FAILED = 'The retrieval of the last inserted ID failed.';

	/**
	 * Stores the persistence configuration.
	 * @var PersistenceConfigurationInterface
	 */
	private PersistenceConfigurationInterface $configuration;

	/**
	 * Stores the PDO connection.
	 * @var PDO
	 */
	private PDO $connection;

	private array $attributes = [
		PDO::ATTR_ERRMODE    => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_AUTOCOMMIT => 0
	];

	/**
	 * Constructor method.
	 * @param PersistenceConfigurationInterface $configuration The persistence configuration.
	 * @param array $attributes The attributes of the underlying PDO connection.
	 * @throws ConnectionFailedException The connection failed.
	 */
	public function __construct( PersistenceConfigurationInterface $configuration, array $attributes = [] )
	{
		$this->configuration = $configuration;
		$this->attributes    = [] === $attributes
			? $this->attributes
			: $attributes;

		$this->connect();
	}

	/**
	 * Connects to the database.
	 */
	private function connect(): void
	{
		$driver     = $this->configuration->getDriver();
		$host       = $this->configuration->getHost();
		$database   = $this->configuration->getDatabase();
		$user       = $this->configuration->getUser();
		$passphrase = $this->configuration->getPassphrase();
		$dsn        = sprintf(
			'%s:dbname=%s;host=%s;charset=utf8',
			$driver,
			$database,
			$host
		);
		try
		{
			$this->connection = new PDO( $dsn, $user, $passphrase );

			foreach ( $this->attributes as $attributeKey => $attributeValue )
			{
				$this->connection->setAttribute( $attributeKey, $attributeValue );
			}
		}
		catch ( PDOException $exception )
		{
			throw new ConnectionFailedException( static::ERROR_CONNECTION_FAILED, $exception->errorInfo[ 1 ], $exception );
		}
	}

	/**
	 * Prepares a statement.
	 * @param string $statement The statement to prepare.
	 * @return PDOStatement The prepared statement.
	 * @throws StatementPreparationFailedException The preparation of the statement failed.
	 */
	private function prepareStatement( string $statement ): PDOStatement
	{
		try
		{
			return $this->connection->prepare( $statement );
		}
		catch ( PDOException $exception )
		{
			throw new StatementPreparationFailedException( static::ERROR_STATEMENT_PREPARATION_FAILED, $exception->errorInfo[ 1 ], $exception );
		}
	}

	/**
	 * Executes a statement.
	 * @param PDOStatement $statement The statement to execute.
	 * @param ?array $arguments The arguments of the statement.
	 * @throws StatementExecutionFailedException The execution of the statement failed.
	 */
	private function executeStatement( PDOStatement $statement, ?array $arguments )
	{
		try
		{
			$statement->execute( $arguments );
		}
		catch ( PDOException $exception )
		{
			throw new StatementExecutionFailedException(
				sprintf(
					static::ERROR_EXECUTION_OF_STATEMENT_FAILED,
					$exception->errorInfo[ 0 ],
					$exception->errorInfo[ 1 ],
					$exception->errorInfo[ 2 ]
				),
				$exception->errorInfo[ 1 ],
				$exception
			);
		}
	}

	/**
	 * Sets the fetch mode of a statement.
	 * @param PDOStatement $statement The statement to set its fetch mode.
	 * @throws SettingFetchModeFailedException The setting of the fetch mode failed.
	 */
	private function setFetchMode( PDOStatement $statement ): void
	{
		$successful = $statement->setFetchMode( PDO::FETCH_OBJ );
		if ( false === $successful )
		{
			throw new FetchingResultFailedException( static::ERROR_SETTING_FETCHMODE_FAILED );
		}
	}

	/**
	 * Fetches the results of a statement.
	 * @param PDOStatement $statement The statement to fetch its results.
	 * @param ?EntityPropertyMapperInterface $entityPropertyMapper The entity property mapper to map the results to entities.
	 * @return stdClass[]|EntityInterface[] The fetched results.
	 */
	private function fetchAll( PDOStatement $statement, ?EntityPropertyMapperInterface $entityPropertyMapper ): array
	{
		$fetchedResults = $statement->fetchAll();
		if ( false === $fetchedResults )
		{
			throw new FetchingResultFailedException( static::ERROR_FETCHING_RESULT_FAILED );
		}

		if ( null === $entityPropertyMapper )
		{
			return $fetchedResults;
		}

		$mappedResults = [];
		foreach ( $fetchedResults as $fetchedResult )
		{
			$mappedResults[] = $entityPropertyMapper->mapFromObject( $fetchedResult );
		}

		return $mappedResults;
	}

	/**
	 * Fetches the first result of a statement.
	 * @param PDOStatement $statement The statement to fetch its first result.
	 * @param ?EntityPropertyMapperInterface $entityPropertyMapper The entity property mapper to map the result to an entity.
	 * @return stdClass|EntityInterface The fetched result.
	 */
	private function fetchFirst( PDOStatement $statement, ?EntityPropertyMapperInterface $entityPropertyMapper ): object
	{
		$fetchedResult = $statement->fetch();
		if ( false === $fetchedResult )
		{
			throw new FetchingResultFailedException( static::ERROR_FETCHING_RESULT_FAILED );
		}

		return null === $entityPropertyMapper
			? $fetchedResult
			: $entityPropertyMapper->mapFromObject( $fetchedResult );
	}

	/**
	 * {@inheritDoc}
	 */
	public function beginTransaction(): bool
	{
		try
		{
			return $this->connection->beginTransaction();
		}
		catch ( PDOException $exception )
		{
			throw new TransactionStartFailedException( static::ERROR_TRANSACTION_START_FAILED, $exception->errorInfo[ 1 ], $exception );
		}
	}

	/**
	 * {@inheritDoc}
	 */
	public function rollback(): bool
	{
		try
		{
			return $this->connection->rollBack();
		}
		catch ( PDOException $exception )
		{
			throw new TransactionRollbackFailedException( static::ERROR_TRANSACTION_ROLLBACK_FAILED, $exception->errorInfo[ 1 ], $exception );
		}
	}

	/**
	 * {@inheritDoc}
	 */
	public function commit(): bool
	{
		try
		{
			return $this->connection->commit();
		}
		catch ( PDOException $exception )
		{
			throw new TransactionCommitFailedException( static::ERROR_TRANSACTION_COMMIT_FAILED, $exception->errorInfo[ 1 ], $exception );
		}
	}

	/**
	 * {@inheritDoc}
	 */
	public function execute( string $statement, ?array $arguments = null ): void
	{
		$this->executeStatement(
			$this->prepareStatement( $statement ),
			$arguments
		);
	}

	/**
	 * {@inheritDoc}
	 */
	public function executeMultiple( array $statements, ?array $arguments = null ): void
	{
		if ( count( $arguments ) !== count( $statements ) )
		{
			throw new InvalidArgumentsStatementsCountException(
				sprintf(
					static::ERROR_INVALID_ARGUMENTS_STATEMENTS_COUNT,
					count( $arguments ),
					count( $statements )
				)
			);
		}

		foreach ( $statements as $statementKey => $statement )
		{
			$this->executeStatement(
				$this->prepareStatement( $statement ),
				$arguments[ $statementKey ]
			);
		}
	}

	/**
	 * {@inheritDoc}
	 */
	public function query( string $statement, ?array $arguments = null, ?EntityPropertyMapperInterface $entityPropertyMapper = null ): array
	{
		$preparedStatement = $this->prepareStatement( $statement );
		$this->executeStatement( $preparedStatement, $arguments );
		$this->setFetchMode( $preparedStatement );

		if ( 0 === $preparedStatement->rowCount() )
		{
			return [];
		}

		return $this->fetchAll( $preparedStatement, $entityPropertyMapper );
	}

	/**
	 * {@inheritDoc}
	 */
	public function queryFirst( string $statement, ?array $arguments = null, ?EntityPropertyMapperInterface $entityPropertyMapper = null ): ?object
	{
		$preparedStatement = $this->prepareStatement( $statement );
		$this->executeStatement( $preparedStatement, $arguments );
		$this->setFetchMode( $preparedStatement );

		if ( 0 === $preparedStatement->rowCount() )
		{
			return null;
		}

		return $this->fetchFirst( $preparedStatement, $entityPropertyMapper );
	}

	/**
	 * {@inheritDoc}
	 */
	public function getLastInsertId(): string
	{
		try
		{
			return $this->connection->lastInsertId();
		}
		catch ( PDOException $exception )
		{
			throw new RetrievingLastInsertedIdFailedException( static::ERROR_RETRIEVING_LAST_INSERTED_ID_FAILED, $exception->errorInfo[ 1 ], $exception );
		}
	}
}
