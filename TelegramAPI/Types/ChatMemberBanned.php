<?php

namespace TelegramApi\Types;

class ChatMemberBanned extends ChatMember
{
	/** @var string The member's status in the chat, always “kicked” */
	public string $status;

	/** @var User Information about the user */
	public User $user;

	/** @var int Date when restrictions will be lifted for this user; unix time. If 0, then the user is banned forever */
	public int $untilDate;
}
