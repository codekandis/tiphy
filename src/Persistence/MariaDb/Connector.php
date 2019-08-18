<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Persistence\MariaDb;

use CodeKandis\Tiphy\Persistence\PersistenceConfigurationInterface;
use CodeKandis\Tiphy\Persistence\PersistenceException;
use PDO;
use PDOException;
use function sprintf;

class Connector implements ConnectorInterface
{
	/** @var PersistenceConfigurationInterface */
	private $config;

	/** @var PDO */
	private $connection;

	public function __construct( PersistenceConfigurationInterface $config )
	{
		$this->config = $config;
		$this->connect();
	}

	private function connect(): void
	{
		$driver           = $this->config->getDriver();
		$host             = $this->config->getHost();
		$database         = $this->config->getDatabase();
		$user             = $this->config->getUser();
		$passphrase       = $this->config->getPassphrase();
		$dsn              = sprintf( '%s:dbname=%s;host=%s;charset=utf8', $driver, $database, $host );
		$this->connection = new PDO( $dsn, $user, $passphrase );
		$this->connection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	}

	public function beginTransaction(): bool
	{
		return $this->connection->beginTransaction();
	}

	public function rollback(): bool
	{
		return $this->connection->rollBack();
	}

	public function commit(): bool
	{
		return $this->connection->commit();
	}

	/**
	 * {@inheritDoc}
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
			$errorInfo        = $exception->errorInfo;
			$exceptionMessage =
				sprintf(
					'[%s] Execution of prepared statement failed. %s: %s', $errorInfo[ 0 ], $errorInfo[ 1 ],
					$errorInfo[ 2 ]
				);
			throw new PersistenceException( $exceptionMessage );
		}
	}

	/**
	 * {@inheritDoc}
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
			$errorInfo        = $exception->errorInfo;
			$exceptionMessage =
				sprintf(
					'[%s] Execution of prepared statement failed. %s: %s', $errorInfo[ 0 ], $errorInfo[ 1 ],
					$errorInfo[ 2 ]
				);
			throw new PersistenceException( $exceptionMessage );
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
	 * {@inheritDoc}
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
			$errorInfo        = $exception->errorInfo;
			$exceptionMessage =
				sprintf(
					'[%s] Execution of prepared statement failed. %s: %s', $errorInfo[ 0 ], $errorInfo[ 1 ],
					$errorInfo[ 2 ]
				);
			throw new PersistenceException( $exceptionMessage );
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

	public function getLastInsertId(): string
	{
		return $this->connection->lastInsertId();
	}
}
