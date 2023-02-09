<?php

namespace TelegramApi\Types;

class VideoChatScheduled implements TypeInterface
{
	/** @var int Point in time (Unix timestamp) when the video chat is supposed to be started by a chat administrator */
	public int $startDate;
}
