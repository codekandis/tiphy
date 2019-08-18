<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Persistence\MariaDb;

use CodeKandis\Tiphy\Persistence\PersistenceException;

interface ConnectorInterface
{
	public function beginTransaction(): bool;

	public function rollback(): bool;

	public function commit(): bool;

	/**
	 * @throws PersistenceException
	 */
	public function execute( string $query, ?array $arguments = null ): void;

	/**
	 * @return object[]
	 * @throws PersistenceException
	 */
	public function query( string $query, ?array $arguments = null, ?string $className = null ): array;

	/**
	 * @throws PersistenceException
	 */
	public function queryFirst( string $query, ?array $arguments = null, ?string $className = null ): ?object;

	public function getLastInsertId(): string;
}
