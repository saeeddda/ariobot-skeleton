<?php

namespace TelegramApi\Types;

class GameHighScore implements TypeInterface
{
	/** @var int Position in high score table for the game */
	public int $position;

	/** @var User User */
	public User $user;

	/** @var int Score */
	public int $score;
}
