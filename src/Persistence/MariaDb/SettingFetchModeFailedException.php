<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Persistence\MariaDb;

use CodeKandis\Tiphy\Persistence\PersistenceException;

/**
 * Represents an exception if the setting of the fetch mode of a statement failed.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class SettingFetchModeFailedException extends PersistenceException
{
}
