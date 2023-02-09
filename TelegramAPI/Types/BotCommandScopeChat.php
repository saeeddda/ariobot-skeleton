<?php

namespace TelegramApi\Types;

class BotCommandScopeChat extends BotCommandScope
{
	/** @var string Scope type, must be chat */
	public string $type = 'chat';

	/** @var int|string Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername) */
	public int|string $chatId;
}
