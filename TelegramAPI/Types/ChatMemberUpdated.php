<?php

namespace TelegramApi\Types;

class ChatMemberUpdated implements TypeInterface
{
	/** @var Chat Chat the user belongs to */
	public Chat $chat;

	/** @var User Performer of the action, which resulted in the change */
	public User $from;

	/** @var int Date the change was done in Unix time */
	public int $date;

	/** @var ChatMember Previous information about the chat member */
	public ChatMember $oldChatMember;

	/** @var ChatMember New information about the chat member */
	public ChatMember $newChatMember;

	/** @var ChatInviteLink|null Optional. Chat invite link, which was used by the user to join the chat; for joining by invite link events only. */
	public ?ChatInviteLink $inviteLink = null;
}
