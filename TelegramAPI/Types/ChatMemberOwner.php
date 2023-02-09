<?php

namespace TelegramApi\Types;

class ChatMemberOwner extends ChatMember
{
	/** @var string The member's status in the chat, always “creator” */
	public string $status;

	/** @var User Information about the user */
	public User $user;

	/** @var bool True, if the user's presence in the chat is hidden */
	public bool $isAnonymous;

	/** @var string|null Optional. Custom title for this user */
	public ?string $customTitle = null;
}
