<?php declare( strict_types = 1 );
namespace CodeKandis\Tiphy\Http\Responses;

use CodeKandis\Tiphy\Http\ContentTypes;
use function feof;
use function fread;
use function fstat;
use function strlen;

/**
 * Represents an CSV HTTP responder.
 * @package codekandis/tiphy
 * @author Christian Ramelow <info@codekandis.net>
 */
class CsvResponder extends AbstractResponder implements CsvResponderInterface
{
	/**
	 * Stores the chunk size of the CSV.
	 * @var string
	 */
	private const CHUNK_SIZE = 8192;

	/**
	 * Stores the file name of the CSV.
	 * @var string
	 */
	private string $fileName = '';

	/**
	 * Sets the file name of the CSV.
	 * @param string $fileName The file name of the CSV.
	 */
	public function setFileName( string $fileName ): void
	{
		$this->fileName = $fileName;
	}

	/**
	 * Gets the data size of the CSV.
	 * @return int The data size of the CSV.
	 */
	private function getDataSize(): int
	{
		$dataStats = fstat( $this->data );

		return $dataStats[ 'size' ];
	}

	/**
	 * {@inheritDoc}
	 * Responds the CSV.
	 */
	public function respond(): void
	{
		$this->sendStatusCode();

		$this->addHeader( Headers::CACHE_CONTROL, 'no-store, no-cache, must-revalidate' );
		$this->addHeader( Headers::CONTENT_TYPE, ContentTypes::TEXT_CSV );
		if ( 0 === strlen( $this->fileName ) )
		{
			$this->addHeader( Headers::CONTENT_DISPOSITION, 'attachment' );
		}
		else
		{
			$this->addHeader( Headers::CONTENT_DISPOSITION, 'attachment; filename="' . $this->fileName . '"' );
		}

		$size = $this->getDataSize();
		$this->addHeader( Headers::CONTENT_LENGTH, (string) $size );

		$this->sendHeaders();

		while ( false === feof( $this->data ) )
		{
			echo fread( $this->data, static::CHUNK_SIZE );
		}
	}
}
