<?php

namespace TelegramApi\Types;

class PollOption implements TypeInterface
{
	/** @var string Option text, 1-100 characters */
	public string $text;

	/** @var int Number of users that voted for this option */
	public int $voterCount;
}
