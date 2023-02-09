<?php

namespace TelegramApi\Types;

class ChatMemberLeft extends ChatMember
{
	/** @var string The member's status in the chat, always “left” */
	public string $status;

	/** @var User Information about the user */
	public User $user;
}
