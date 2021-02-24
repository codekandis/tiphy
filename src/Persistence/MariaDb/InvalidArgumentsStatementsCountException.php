<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Persistence\MariaDb;

use CodeKandis\Tiphy\Persistence\PersistenceException;

/**
 * Represents an exception if the number of argument lists does not match the number of statements.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class InvalidArgumentsStatementsCountException extends PersistenceException
{
}
