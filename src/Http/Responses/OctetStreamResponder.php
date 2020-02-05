<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Http\Responses;

use CodeKandis\Tiphy\Http\ContentTypes;
use CodeKandis\Tiphy\Http\Requests\Range;
use function feof;
use function fread;
use function fseek;
use function fstat;
use function sprintf;

class OctetStreamResponder extends AbstractResponder implements OctetStreamResponderInterface
{
	private const CHUNK_SIZE = 8192;

	/** @var string */
	private $fileName;

	/** @var Range */
	private $range;

	public function setFileName( string $fileName ): void
	{
		$this->fileName = $fileName;
	}

	public function setRange( Range $range ): void
	{
		$this->range = $range;
	}

	private function getDataSize(): int
	{
		$dataStats = fstat( $this->data );

		return $dataStats[ 'size' ];
	}

	private function respondFull(): void
	{
		$size = $this->getDataSize();
		$this->addHeader( Headers::CONTENT_LENGTH, (string) $size );

		$this->sendHeaders();

		while ( false === feof( $this->data ) )
		{
			$chunk = fread( $this->data, static::CHUNK_SIZE );
			echo $chunk;
		}
	}

	private function respondOffsetStartoffSetEndRange(): void
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
			$chunk     = fread( $this->data, $chunkSize );
			echo $chunk;
		}
	}

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
			$chunk = fread( $this->data, static::CHUNK_SIZE );
			echo $chunk;
		}
	}

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
			$chunk = fread( $this->data, static::CHUNK_SIZE );
			echo $chunk;
		}
	}

	private function respondRange(): void
	{
		$rangeType = $this->range->getType();
		switch ( $rangeType )
		{
			case Range::RANGE_TYPE_OFFSET_START_OFFSET_END:
			{
				$this->respondOffsetStartoffSetEndRange();

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
