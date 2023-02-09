<?php

namespace TelegramApi\Types;

class BotCommandScopeAllChatAdministrators extends BotCommandScope
{
	/** @var string Scope type, must be all_chat_administrators */
	public string $type = 'all_chat_administrators';
}
