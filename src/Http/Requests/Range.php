<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Http\Requests;

class Range implements RangeInterface
{
	public const RANGE_TYPE_NONE                    = 0;

	public const RANGE_TYPE_OFFSET_START_OFFSET_END = 1;

	public const RANGE_TYPE_OFFSET_START            = 2;

	public const RANGE_TYPE_NEGATIVE_OFFSET_START   = 3;

	/** @var ?int */
	private $offsetStart;

	/** @var ?int */
	private $offsetEnd;

	/** @var int */
	private $type;

	public function __construct( ?int $offsetStart, ?int $offsetEnd )
	{
		$this->offsetStart = $offsetStart;
		$this->offsetEnd   = $offsetEnd;

		$this->determineRangeTypes();
	}

	public function getOffsetStart(): ?int
	{
		return $this->offsetStart;
	}

	public function getOffsetEnd(): ?int
	{
		return $this->offsetEnd;
	}

	public function getType(): int
	{
		return $this->type;
	}

	private function determineRangeTypes(): void
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
		};
		$this->type = static::RANGE_TYPE_NONE;
	}

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
