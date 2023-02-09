<?php

namespace TelegramApi\Types;

class BotCommandScopeAllGroupChats extends BotCommandScope
{
	/** @var string Scope type, must be all_group_chats */
	public string $type = 'all_group_chats';
}
