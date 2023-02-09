<?php

namespace TelegramApi\Types;

class BotCommandScopeDefault extends BotCommandScope
{
	/** @var string Scope type, must be default */
	public string $type = 'default';
}
