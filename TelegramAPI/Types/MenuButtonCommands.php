<?php

namespace TelegramApi\Types;

class MenuButtonCommands extends MenuButton
{
	/** @var string Type of the button, must be commands */
	public string $type = 'commands';
}
