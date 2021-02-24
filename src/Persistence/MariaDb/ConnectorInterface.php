<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Persistence\MariaDb;

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
	 * Executes a statement.
	 * @param string $statement The statement to execute.
	 * @param ?array $arguments The arguments of the statement.
	 * @throws ExecutionOfStatementFailedException The execution of the statement failed.
	 */
	public function execute( string $statement, ?array $arguments = null ): void;

	/**
	 * Executes multiple statements.
	 * @param string[] $statements The statements to execute.
	 * @param ?array[] $arguments The arguments of the statements.
	 * @throws InvalidArgumentsStatementsCountException The number of argument lists does not match the number of statements.
	 * @throws ExecutionOfStatementFailedException The execution of the statement failed.
	 */
	public function executeMultiple( array $statements, ?array $arguments = null ): void;

	/**
	 * Executes a statement and returns the statement result as a list of objects.
	 * @param string $statement The statement to execute.
	 * @param ?array $arguments The arguments of the statement.
	 * @param ?string $className The name of the class to convert the result rows into.
	 * @return object[] The list of statement result row objects.
	 * @throws ExecutionOfStatementFailedException The execution of the statement failed.
	 */
	public function query( string $statement, ?array $arguments = null, ?string $className = null ): array;

	/**
	 * Executes a statement and returns the first row of the statement result as an object.
	 * @param string $statement The statement to execute.
	 * @param ?array $arguments The arguments of the statement.
	 * @param ?string $className The name of the class to convert the result row into.
	 * @return ?object The first row of the statement result row as an object.
	 * @throws ExecutionOfStatementFailedException The execution of the statement failed.
	 */
	public function queryFirst( string $statement, ?array $arguments = null, ?string $className = null ): ?object;

	/**
	 * Gets the ID of the last inserted record.
	 * @return string The ID of the last inserted record.
	 * @throws RetrievingLastInsertedIdFailedException The retrieval of the last inserted ID has been failed.
	 */
	public function getLastInsertId(): string;
}
