<?php

namespace TelegramApi\Types;

class VideoChatEnded implements TypeInterface
{
	/** @var int Video chat duration in seconds */
	public int $duration;
}
