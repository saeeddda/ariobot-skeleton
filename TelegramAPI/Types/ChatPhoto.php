<?php

namespace TelegramApi\Types;

class ChatPhoto implements TypeInterface
{
	/** @var string File identifier of small (160x160) chat photo. This file_id can be used only for photo download and only for as long as the photo is not changed. */
	public string $smallFileId;

	/** @var string Unique file identifier of small (160x160) chat photo, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file. */
	public string $smallFileUniqueId;

	/** @var string File identifier of big (640x640) chat photo. This file_id can be used only for photo download and only for as long as the photo is not changed. */
	public string $bigFileId;

	/** @var string Unique file identifier of big (640x640) chat photo, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file. */
	public string $bigFileUniqueId;
}
