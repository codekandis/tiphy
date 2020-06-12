<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Http\Requests;

/**
 * Represents the interface of all ranges.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
interface RangeInterface
{
	/**
	 * Gets the start offset of the range.
	 * @return null|int The start offset of the range.
	 */
	public function getOffsetStart(): ?int;

	/**
	 * Gets the end offset of the range.
	 * @return null|int The end offset of the range.
	 */
	public function getOffsetEnd(): ?int;

	/**
	 * Gets the type of the range.
	 * @return int The type of the range.
	 */
	public function getType(): int;

	/**
	 * Determines if the range is valid.
	 * @param int $size The size of the range.
	 * @return bool True if the range is valid, false otherwise.
	 */
	public function isValid( int $size ): bool;
}
