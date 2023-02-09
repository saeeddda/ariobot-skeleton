<?php

namespace TelegramApi\Types;

class BotCommand implements TypeInterface
{
	/** @var string Text of the command; 1-32 characters. Can contain only lowercase English letters, digits and underscores. */
	public string $command;

	/** @var string Description of the command; 1-256 characters. */
	public string $description;
}
