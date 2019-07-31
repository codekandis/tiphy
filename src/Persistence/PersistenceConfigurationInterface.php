<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Persistence;

interface PersistenceConfigurationInterface
{
	public function getDriver(): string;

	public function getHost(): string;

	public function getDatabase(): string;

	public function getUser(): string;

	public function getPassphrase(): string;
}
