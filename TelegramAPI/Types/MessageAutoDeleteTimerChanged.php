<?php

namespace TelegramApi\Types;

class MessageAutoDeleteTimerChanged implements TypeInterface
{
	/** @var int New auto-delete time for messages in the chat; in seconds */
	public int $messageAutoDeleteTime;
}
