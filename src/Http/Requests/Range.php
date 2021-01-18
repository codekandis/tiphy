<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Http\Requests;

/**
 * Represents a range.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class Range implements RangeInterface
{
	/**
	 * Defines the unknown range.
	 * @var int
	 */
	public const RANGE_TYPE_NONE = 0;

	/**
	 * Defines the range with a start and end offset.
	 * @var int
	 */
	public const RANGE_TYPE_OFFSET_START_OFFSET_END = 1;

	/**
	 * Defines the range with a start offset.
	 * @var int
	 */
	public const RANGE_TYPE_OFFSET_START = 2;

	/**
	 * Defines the range with a negative start offset.
	 * @var int
	 */
	public const RANGE_TYPE_NEGATIVE_OFFSET_START = 3;

	/**
	 * Stores the start offset of the range
	 * @var ?int
	 */
	private ?int $offsetStart;

	/**
	 * Stores the end offset of the range
	 * @var ?int
	 */
	private ?int $offsetEnd;

	/**
	 * Stores the type of the range
	 * @var int
	 */
	private ?int $type;

	/**
	 * Constructor method.
	 * @param ?int $offsetStart The start offset of the range.
	 * @param ?int $offsetEnd The end offset of the range.
	 */
	public function __construct( ?int $offsetStart, ?int $offsetEnd )
	{
		$this->offsetStart = $offsetStart;
		$this->offsetEnd   = $offsetEnd;

		$this->determineRangeType();
	}

	/**
	 * @inheritDoc
	 */
	public function getOffsetStart(): ?int
	{
		return $this->offsetStart;
	}

	/**
	 * @inheritDoc
	 */
	public function getOffsetEnd(): ?int
	{
		return $this->offsetEnd;
	}

	/**
	 * @inheritDoc
	 */
	public function getType(): int
	{
		return $this->type;
	}

	/**
	 * Determines the type of the range.
	 */
	private function determineRangeType(): void
	{
		if ( null !== $this->offsetStart && null !== $this->offsetEnd )
		{
			$this->type = static::RANGE_TYPE_OFFSET_START_OFFSET_END;

			return;
		}
		if ( null !== $this->offsetStart && null === $this->offsetEnd && 0 <= $this->offsetStart )
		{
			$this->type = static::RANGE_TYPE_OFFSET_START;

			return;
		}
		if ( null !== $this->offsetStart && null === $this->offsetEnd && 0 > $this->offsetStart )
		{
			$this->type = static::RANGE_TYPE_NEGATIVE_OFFSET_START;

			return;
		}
		$this->type = static::RANGE_TYPE_NONE;
	}

	/**
	 * @inheritDoc
	 */
	public function isValid( int $size ): bool
	{
		if ( static::RANGE_TYPE_NONE )
		{
			return false;
		}
		$rangeOffsetLength   =
			static::RANGE_TYPE_OFFSET_START_OFFSET_END === $this->type
			&& 0 <= $this->offsetStart
			&& $this->offsetEnd > $this->offsetStart
			&& $size > $this->offsetStart
			&& $size >= $this->offsetEnd;
		$rangeOffset         =
			static::RANGE_TYPE_OFFSET_START === $this->type
			&& 0 <= $this->offsetStart
			&& $size >= $this->offsetStart;
		$rangeNegativeOffset =
			static::RANGE_TYPE_NEGATIVE_OFFSET_START === $this->type
			&& 0 > $this->offsetStart
			&& 0 <= $size - $this->offsetStart;

		return $rangeOffsetLength || $rangeOffset || $rangeNegativeOffset;
	}
}
