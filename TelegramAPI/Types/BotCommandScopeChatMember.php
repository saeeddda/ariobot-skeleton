<?php

namespace TelegramApi\Types;

class BotCommandScopeChatMember extends BotCommandScope
{
	/** @var string Scope type, must be chat_member */
	public string $type = 'chat_member';

	/** @var int|string Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername) */
	public int|string $chatId;

	/** @var int Unique identifier of the target user */
	public int $userId;
}
