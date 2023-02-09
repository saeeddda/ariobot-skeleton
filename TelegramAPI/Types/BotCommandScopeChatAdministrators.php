<?php

namespace TelegramApi\Types;

class BotCommandScopeChatAdministrators extends BotCommandScope
{
	/** @var string Scope type, must be chat_administrators */
	public string $type = 'chat_administrators';

	/** @var int|string Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername) */
	public int|string $chatId;
}
