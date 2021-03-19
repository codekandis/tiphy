<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Http\Responses;

use CodeKandis\Tiphy\Http\ContentTypes;
use CodeKandis\Tiphy\Http\Requests\Range;
use function feof;
use function fread;
use function fseek;
use function fstat;
use function sprintf;

/**
 * Represents an octet stream HTTP responder.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class OctetStreamResponder extends AbstractResponder implements OctetStreamResponderInterface
{
	/**
	 * Stores the chunk size of the octet stream.
	 * @var string
	 */
	private const CHUNK_SIZE = 8192;

	/**
	 * Stores the file name of the octet stream.
	 * @var string
	 */
	private string $fileName;

	/**
	 * Stores the range of the octet stream.
	 * @var Range
	 */
	private Range $range;

	/**
	 * Sets the file name of the octet stream.
	 * @param string $fileName The file name of the octet stream.
	 */
	public function setFileName( string $fileName ): void
	{
		$this->fileName = $fileName;
	}

	/**
	 * Sets the range of the octet stream.
	 * @param Range $range The range of the octet stream.
	 */
	public function setRange( Range $range ): void
	{
		$this->range = $range;
	}

	/**
	 * Gets the data size of the octet stream.
	 * @return int The data size of the octet stream.
	 */
	private function getDataSize(): int
	{
		$dataStats = fstat( $this->data );

		return $dataStats[ 'size' ];
	}

	/**
	 * Responds the full octet stream.
	 */
	private function respondFull(): void
	{
		$size = $this->getDataSize();
		$this->addHeader( Headers::CONTENT_LENGTH, (string) $size );

		$this->sendHeaders();

		while ( false === feof( $this->data ) )
		{
			echo fread( $this->data, static::CHUNK_SIZE );
		}
	}

	/**
	 * Responds the octet stream froom a start offset to an end offset.
	 */
	private function respondOffsetStartOffSetEndRange(): void
	{
		$offsetStart = $this->range->getOffsetStart();
		$offsetEnd   = $this->range->getOffsetEnd();

		$size         = $this->getDataSize();
		$contentRange = sprintf(
			'bytes %s-%s/%s',
			$offsetStart,
			$offsetEnd,
			$size
		);
		$this->addHeader( headers::CONTENT_RANGE, $contentRange );

		$length = $offsetEnd - $offsetStart;
		$this->addHeader( Headers::CONTENT_LENGTH, (string) $length );

		$this->sendHeaders();

		fseek( $this->data, $offsetStart );
		while ( 0 !== $length )
		{
			$chunkSize = static::CHUNK_SIZE > $length ? $length : static::CHUNK_SIZE;
			$length    -= $chunkSize;
			echo fread( $this->data, $chunkSize );
		}
	}

	/**
	 * Responds the octet stream from a start offset.
	 */
	private function respondOffsetStart(): void
	{
		$offsetStart = $this->range->getOffsetStart();

		$size         = $this->getDataSize();
		$contentRange = sprintf(
			'bytes %s-%s/%s',
			$offsetStart,
			$size,
			$size
		);
		$this->addHeader( headers::CONTENT_RANGE, $contentRange );

		$length = $size - $offsetStart;
		$this->addHeader( Headers::CONTENT_LENGTH, (string) $length );

		$this->sendHeaders();

		fseek( $this->data, $offsetStart );
		while ( false === feof( $this->data ) )
		{
			echo fread( $this->data, static::CHUNK_SIZE );
		}
	}

	/**
	 * Responds the octet stream from an negative start offset.
	 */
	private function respondNegativeOffsetStart(): void
	{
		$size        = $this->getDataSize();
		$offsetStart = $size + $this->range->getOffsetStart();

		$contentRange = sprintf(
			'bytes %s-%s/%s',
			$offsetStart,
			$size,
			$size
		);
		$this->addHeader( headers::CONTENT_RANGE, $contentRange );

		$length = $size - $offsetStart;
		$this->addHeader( Headers::CONTENT_LENGTH, (string) $length );

		$this->sendHeaders();

		fseek( $this->data, $offsetStart );
		while ( false === feof( $this->data ) )
		{
			echo fread( $this->data, static::CHUNK_SIZE );
		}
	}

	/**
	 * Responds a specific range of the octet stream.
	 */
	private function respondRange(): void
	{
		$rangeType = $this->range->getType();
		switch ( $rangeType )
		{
			case Range::RANGE_TYPE_OFFSET_START_OFFSET_END:
			{
				$this->respondOffsetStartOffSetEndRange();

				break;
			}
			case Range::RANGE_TYPE_OFFSET_START:
			{
				$this->respondOffsetStart();
				break;
			}
			case Range::RANGE_TYPE_NEGATIVE_OFFSET_START:
			{
				$this->respondNegativeOffsetStart();
				break;
			}
		}
	}

	/**
	 * {@inheritDoc}
	 * Responds the octet stream.
	 */
	public function respond(): void
	{
		$this->sendStatusCode();

		$this->addHeader( Headers::CACHE_CONTROL, 'no-store, no-cache, must-revalidate' );
		$this->addHeader( Headers::CONTENT_TYPE, ContentTypes::APPLICATION_OCTET_STREAM );
		$this->addHeader( Headers::CONTENT_DISPOSITION, 'attachment; filename="' . $this->fileName . '"' );

		if ( null === $this->range )
		{
			$this->respondFull();

			return;
		}
		$this->respondRange();
	}
}
