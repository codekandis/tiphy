<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Http\UriBuilders;

/**
 * Represents the interface of all URI builders.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
interface UriBuilderInterface
{
	/**
	 * Builds a specific URI.
	 * @param string $uriName The name of the URI.
	 * @param string ...$arguments The arguments needed to build the URI.
	 * @return string The build URI.
	 */
	public function build( string $uriName, string...$arguments ): string;
}
