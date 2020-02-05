<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Persistence\MariaDb;

use CodeKandis\Tiphy\Persistence\PersistenceException;

/**
 * Represents the interface of all MariaDb database connectors.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
interface ConnectorInterface
{
	/**
	 * Starts a transaction.
	 * @return bool True if the transaction has been started, false otherwise.
	 */
	public function beginTransaction(): bool;

	/**
	 * Rolls back a transaction.
	 * @return bool True if the transaction has been rolled back, false otherwise.
	 */
	public function rollback(): bool;

	/**
	 * Commits a transaction.
	 * @return bool True if the transaction has been commited, false otherwise.
	 */
	public function commit(): bool;

	/**
	 * Executes a query.
	 * @param string $query The query to execute.
	 * @param ?array $arguments The arguments of the query.
	 * @throws PersistenceException An error occurred during the query execution.
	 */
	public function execute( string $query, ?array $arguments = null ): void;

	/**
	 * Executes a query and returns the query result as a list of objects.
	 * @param string $query The query to execute.
	 * @param ?array $arguments The arguments of the query.
	 * @param ?string The name of the class to convert the result rows into.
	 * @return object[] The list of query result row objects.
	 * @throws PersistenceException An error occurred during the query execution.
	 */
	public function query( string $query, ?array $arguments = null, ?string $className = null ): array;

	/**
	 * Executes a query and returns the first row of the query result as an object.
	 * @param string $query The query to execute.
	 * @param ?array $arguments The arguments of the query.
	 * @param ?string The name of the class to convert the result row into.
	 * @return ?object The first row of the query result row as an object.
	 * @throws PersistenceException An error occurred during the query execution.
	 */
	public function queryFirst( string $query, ?array $arguments = null, ?string $className = null ): ?object;

	/**
	 * Gets the ID of the last inserted record.
	 * @return string The ID of the last inserted record.
	 */
	public function getLastInsertId(): string;
}
