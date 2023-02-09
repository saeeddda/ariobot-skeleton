<?php

namespace TelegramApi\Types;

class BotCommandScopeAllPrivateChats extends BotCommandScope
{
	/** @var string Scope type, must be all_private_chats */
	public string $type = 'all_private_chats';
}
