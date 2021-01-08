<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Persistence\MariaDb;

/**
 * Represents the interface of all MariaDB in array helpers for prepared statements.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
interface PreparedStatementInArrayHelperInterface
{
	/**
	 * Gets the string with the named placeholders specified by their indices.
	 * @return string The string with the named placeholders.
	 */
	public function getNamedPlaceholders(): string;

	/**
	 * Gets the associative array with the arguments specified by their indices and the placholder prefrix.
	 * @return array The associative array with the arguments specified by their indices and the placholder prefrix.
	 */
	public function getArguments(): array;
}
