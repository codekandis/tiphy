<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Persistence\MariaDb;

use CodeKandis\Tiphy\Persistence\PersistenceConfigurationInterface;
use PDO;
use PDOException;
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
	 * Represents the error message if the connection failed.
	 * @var string
	 */
	public const ERROR_CONNECTION_FAILED = 'The connection failed.';

	/**
	 * Represents the error message if the number of argument lists does not match the number of statements.
	 * @var string
	 */
	public const ERROR_INVALID_ARGUMENTS_STATEMENTS_COUNT = 'The number of argument lists `%d` does not match the number of statements `%d`.';

	/**
	 * Represents the error message if the execution of a statement failed.
	 * @var string
	 */
	public const ERROR_EXECUTION_OF_STATEMENT_FAILED = '[%d] The execution of the statement failed. %s: %s';

	/**
	 * Represents the error message if the retrieval of the last inserted ID has been failed.
	 * @var string
	 */
	public const ERROR_RETRIEVING_LAST_INSERTED_ID_FAILED = 'The retrieval of the last inserted ID has been failed.';

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
	 * @throws ConnectionFailedException The connection has been failed.
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
	 * @inheritDoc
	 */
	public function beginTransaction(): bool
	{
		return $this->connection->beginTransaction();
	}

	/**
	 * @inheritDoc
	 */
	public function rollback(): bool
	{
		return $this->connection->rollBack();
	}

	/**
	 * @inheritDoc
	 */
	public function commit(): bool
	{
		return $this->connection->commit();
	}

	/**
	 * @inheritDoc
	 */
	public function execute( string $query, ?array $arguments = null ): void
	{
		$preparedStatement = $this->connection->prepare( $query );

		try
		{
			$preparedStatement->execute( $arguments );
		}
		catch ( PDOException $exception )
		{
			throw new ExecutionOfStatementFailedException(
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
		try
		{
			foreach ( $statements as $statementKey => $statement )
			{
				$preparedStatement = $this->connection->prepare( $statement );
				$preparedStatement->execute( $arguments[ $statementKey ] );
			}
		}
		catch ( PDOException $exception )
		{
			throw new ExecutionOfStatementFailedException(
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
	public function query( string $query, ?array $arguments = null, ?string $className = null ): array
	{
		$preparedStatement = $this->connection->prepare( $query );

		try
		{
			$preparedStatement->execute( $arguments );
		}
		catch ( PDOException $exception )
		{
			throw new ExecutionOfStatementFailedException(
				sprintf(
					static::ERROR_EXECUTION_OF_STATEMENT_FAILED,
					$exception->errorInfo[ 0 ],
					$exception->errorInfo[ 1 ],
					$exception->errorInfo[ 2 ]
				),
				$exception->errorInfo[ 1 ]
			);
		}

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
	public function queryFirst( string $query, ?array $arguments = null, ?string $className = null ): ?object
	{
		$preparedStatement = $this->connection->prepare( $query );

		try
		{
			$preparedStatement->execute( $arguments );
		}
		catch ( PDOException $exception )
		{
			throw new ExecutionOfStatementFailedException(
				sprintf(
					static::ERROR_EXECUTION_OF_STATEMENT_FAILED,
					$exception->errorInfo[ 0 ],
					$exception->errorInfo[ 1 ],
					$exception->errorInfo[ 2 ]
				),
				$exception->errorInfo[ 1 ]
			);
		}

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
