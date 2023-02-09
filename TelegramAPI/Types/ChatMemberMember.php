<?php

namespace TelegramApi\Types;

class ChatMemberMember extends ChatMember
{
	/** @var string The member's status in the chat, always “member” */
	public string $status;

	/** @var User Information about the user */
	public User $user;
}
