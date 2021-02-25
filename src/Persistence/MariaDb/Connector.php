<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Persistence\MariaDb;

use CodeKandis\Tiphy\Persistence\PersistenceConfigurationInterface;
use PDO;
use PDOException;
use PDOStatement;
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
	 * Represents the error message if a connection failed.
	 * @var string
	 */
	public const ERROR_CONNECTION_FAILED = 'The connection failed.';

	/**
	 * Represents the error message if a transaction failed to start.
	 * @var string
	 */
	public const ERROR_TRANSACTION_START_FAILED = 'The transaction start failed.';

	/**
	 * Represents the error message if a transaction failed to rollback.
	 * @var string
	 */
	public const ERROR_TRANSACTION_ROLLBACK_FAILED = 'The transaction rollback failed.';

	/**
	 * Represents the error message if a transaction failed to commit.
	 * @var string
	 */
	public const ERROR_TRANSACTION_COMMIT_FAILED = 'The transaction commit failed.';

	/**
	 * Represents the error message if the preparation of a statement failed.
	 * @var string
	 */
	public const ERROR_STATEMENT_PREPARATION_FAILED = 'The preparation of the statement failed.';

	/**
	 * Represents the error message if a number of argument lists does not match a number of statements.
	 * @var string
	 */
	public const ERROR_INVALID_ARGUMENTS_STATEMENTS_COUNT = 'The number of argument lists `%d` does not match the number of statements `%d`.';

	/**
	 * Represents the error message if the execution of a statement failed.
	 * @var string
	 */
	public const ERROR_EXECUTION_OF_STATEMENT_FAILED = '[%d] The execution of the statement failed. %s: %s';

	/**
	 * Represents the error message if the retrieval of the last inserted ID failed.
	 * @var string
	 */
	public const ERROR_RETRIEVING_LAST_INSERTED_ID_FAILED = 'The retrieval of the last inserted ID failed.';

	/**
	 * Stores the persistence configuration.
	 * @var PersistenceConfigurationInterface
	 */
	private PersistenceConfigurationInterface $config;

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
	 * @param PersistenceConfigurationInterface $config The persistence configuration.
	 * @param array $attributes The attributes of the underlying PDO connection.
	 * @throws ConnectionFailedException The connection failed.
	 */
	public function __construct( PersistenceConfigurationInterface $config, array $attributes = [] )
	{
		$this->config     = $config;
		$this->attributes = [] === $attributes
			? $this->attributes
			: $attributes;

		$this->connect();
	}

	/**
	 * Connects to the database.
	 */
	private function connect(): void
	{
		$driver     = $this->config->getDriver();
		$host       = $this->config->getHost();
		$database   = $this->config->getDatabase();
		$user       = $this->config->getUser();
		$passphrase = $this->config->getPassphrase();
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
			throw new ConnectionFailedException( static::ERROR_CONNECTION_FAILED );
		}
	}

	/**
	 * Prepares a statement.
	 * @param string $statement The statement to prepare
	 * @return PDOStatement
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
			throw new StatementPreparationFailedException( static::ERROR_STATEMENT_PREPARATION_FAILED );
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
				$exception->errorInfo[ 1 ]
			);
		}
	}

	/**
	 * @inheritDoc
	 */
	public function beginTransaction(): bool
	{
		try
		{
			return $this->connection->beginTransaction();
		}
		catch ( PDOException $exception )
		{
			throw new TransactionStartFailedException( static::ERROR_TRANSACTION_START_FAILED );
		}
	}

	/**
	 * @inheritDoc
	 */
	public function rollback(): bool
	{
		try
		{
			return $this->connection->rollBack();
		}
		catch ( PDOException $exception )
		{
			throw new TransactionRollbackFailedException( static::ERROR_TRANSACTION_ROLLBACK_FAILED );
		}
	}

	/**
	 * @inheritDoc
	 */
	public function commit(): bool
	{
		try
		{
			return $this->connection->commit();
		}
		catch ( PDOException $exception )
		{
			throw new TransactionCommitFailedException( static::ERROR_TRANSACTION_COMMIT_FAILED );
		}
	}

	/**
	 * @inheritDoc
	 */
	public function execute( string $statement, ?array $arguments = null ): void
	{
		$this->executeStatement(
			$this->prepareStatement( $statement ),
			$arguments
		);
	}

	/**
	 * @inheritDoc
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
	 * @inheritDoc
	 */
	public function query( string $statement, ?array $arguments = null, ?string $className = null ): array
	{
		$preparedStatement = $this->prepareStatement( $statement );
		$this->executeStatement( $preparedStatement, $arguments );

		if ( null === $className )
		{
			$preparedStatement->setFetchMode( PDO::FETCH_OBJ );
		}
		else
		{
			$preparedStatement->setFetchMode( PDO::FETCH_CLASS, $className );
		}

		return $preparedStatement->fetchAll();
	}

	/**
	 * @inheritDoc
	 */
	public function queryFirst( string $statement, ?array $arguments = null, ?string $className = null ): ?object
	{
		$preparedStatement = $this->prepareStatement( $statement );
		$this->executeStatement( $preparedStatement, $arguments );

		if ( null === $className )
		{
			$preparedStatement->setFetchMode( PDO::FETCH_OBJ );
		}
		else
		{
			$preparedStatement->setFetchMode( PDO::FETCH_CLASS, $className );
		}
		$result = $preparedStatement->fetch();

		return false !== $result ? $result : null;
	}

	/**
	 * @inheritDoc
	 */
	public function getLastInsertId(): string
	{
		try
		{
			return $this->connection->lastInsertId();
		}
		catch ( PDOException $exception )
		{
			throw new RetrievingLastInsertedIdFailedException( static::ERROR_RETRIEVING_LAST_INSERTED_ID_FAILED );
		}
	}
}
