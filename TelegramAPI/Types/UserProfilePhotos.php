<?php

namespace TelegramApi\Types;

class UserProfilePhotos implements TypeInterface
{
	/** @var int Total number of profile pictures the target user has */
	public int $totalCount;

	/** @var Array<Array<PhotoSize>> Requested profile pictures (in up to 4 sizes each) */
	public array $photos;
}
