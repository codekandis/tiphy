<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Persistence\MariaDb;

use CodeKandis\Tiphy\Persistence\PersistenceConfigurationInterface;
use CodeKandis\Tiphy\Persistence\PersistenceException;
use PDO;
use PDOException;
use function sprintf;

/**
 * Represents a MariaDb database connector.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class Connector implements ConnectorInterface
{
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
		$driver           = $this->config->getDriver();
		$host             = $this->config->getHost();
		$database         = $this->config->getDatabase();
		$user             = $this->config->getUser();
		$passphrase       = $this->config->getPassphrase();
		$dsn              = sprintf(
			'%s:dbname=%s;host=%s;charset=utf8',
			$driver,
			$database,
			$host
		);
		$this->connection = new PDO( $dsn, $user, $passphrase );

		foreach ( $this->attributes as $attributeKey => $attributeValue )
		{
			$this->connection->setAttribute( $attributeKey, $attributeValue );
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
			throw new PersistenceException(
				sprintf(
					'[%s] Execution of prepared statement failed. %s: %s',
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
			throw new PersistenceException(
				sprintf(
					'[%s] Execution of prepared statement failed. %s: %s',
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
			throw new PersistenceException(
				sprintf(
					'[%s] Execution of prepared statement failed. %s: %s',
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
		return $this->connection->lastInsertId();
	}
}
