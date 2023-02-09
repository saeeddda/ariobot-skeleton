<?php

namespace TelegramApi\Types;

class ChatJoinRequest implements TypeInterface
{
	/** @var Chat Chat to which the request was sent */
	public Chat $chat;

	/** @var User User that sent the join request */
	public User $from;

	/** @var int Date the request was sent in Unix time */
	public int $date;

	/** @var string|null Optional. Bio of the user. */
	public ?string $bio = null;

	/** @var ChatInviteLink|null Optional. Chat invite link that was used by the user to send the join request */
	public ?ChatInviteLink $inviteLink = null;
}
