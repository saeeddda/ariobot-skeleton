<?php

namespace TelegramApi\Types;

class PhotoSize implements TypeInterface
{
	/** @var string Identifier for this file, which can be used to download or reuse the file */
	public string $fileId;

	/** @var string Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file. */
	public string $fileUniqueId;

	/** @var int Photo width */
	public int $width;

	/** @var int Photo height */
	public int $height;

	/** @var int|null Optional. File size in bytes */
	public ?int $fileSize = null;
}
