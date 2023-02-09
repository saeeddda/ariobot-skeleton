<?php

namespace TelegramApi\Types;

class PassportFile implements TypeInterface
{
	/** @var string Identifier for this file, which can be used to download or reuse the file */
	public string $fileId;

	/** @var string Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file. */
	public string $fileUniqueId;

	/** @var int File size in bytes */
	public int $fileSize;

	/** @var int Unix time when the file was uploaded */
	public int $fileDate;
}
