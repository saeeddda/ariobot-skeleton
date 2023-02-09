<?php

namespace TelegramApi\Types;

class Audio implements TypeInterface
{
	/** @var string Identifier for this file, which can be used to download or reuse the file */
	public string $fileId;

	/** @var string Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file. */
	public string $fileUniqueId;

	/** @var int Duration of the audio in seconds as defined by sender */
	public int $duration;

	/** @var string|null Optional. Performer of the audio as defined by sender or by audio tags */
	public ?string $performer = null;

	/** @var string|null Optional. Title of the audio as defined by sender or by audio tags */
	public ?string $title = null;

	/** @var string|null Optional. Original filename as defined by sender */
	public ?string $fileName = null;

	/** @var string|null Optional. MIME type of the file as defined by sender */
	public ?string $mimeType = null;

	/** @var int|null Optional. File size in bytes. It can be bigger than 2^31 and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe for storing this value. */
	public ?int $fileSize = null;

	/** @var PhotoSize|null Optional. Thumbnail of the album cover to which the music file belongs */
	public ?PhotoSize $thumb = null;
}
