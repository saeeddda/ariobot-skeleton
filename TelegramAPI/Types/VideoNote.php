<?php

namespace TelegramApi\Types;

class VideoNote implements TypeInterface
{
	/** @var string Identifier for this file, which can be used to download or reuse the file */
	public string $fileId;

	/** @var string Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file. */
	public string $fileUniqueId;

	/** @var int Video width and height (diameter of the video message) as defined by sender */
	public int $length;

	/** @var int Duration of the video in seconds as defined by sender */
	public int $duration;

	/** @var PhotoSize|null Optional. Video thumbnail */
	public ?PhotoSize $thumb = null;

	/** @var int|null Optional. File size in bytes */
	public ?int $fileSize = null;
}
