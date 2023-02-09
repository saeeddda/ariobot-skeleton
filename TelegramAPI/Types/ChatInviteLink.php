<?php

namespace TelegramApi\Types;

class ChatInviteLink implements TypeInterface
{
	/** @var string The invite link. If the link was created by another chat administrator, then the second part of the link will be replaced with “…”. */
	public string $inviteLink;

	/** @var User Creator of the link */
	public User $creator;

	/** @var bool True, if users joining the chat via the link need to be approved by chat administrators */
	public bool $createsJoinRequest;

	/** @var bool True, if the link is primary */
	public bool $isPrimary;

	/** @var bool True, if the link is revoked */
	public bool $isRevoked;

	/** @var string|null Optional. Invite link name */
	public ?string $name = null;

	/** @var int|null Optional. Point in time (Unix timestamp) when the link will expire or has been expired */
	public ?int $expireDate = null;

	/** @var int|null Optional. The maximum number of users that can be members of the chat simultaneously after joining the chat via this invite link; 1-99999 */
	public ?int $memberLimit = null;

	/** @var int|null Optional. Number of pending join requests created using this link */
	public ?int $pendingJoinRequestCount = null;
}
