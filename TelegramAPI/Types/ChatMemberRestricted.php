<?php

namespace TelegramApi\Types;

class ChatMemberRestricted extends ChatMember
{
	/** @var string The member's status in the chat, always “restricted” */
	public string $status;

	/** @var User Information about the user */
	public User $user;

	/** @var bool True, if the user is a member of the chat at the moment of the request */
	public bool $isMember;

	/** @var bool True, if the user is allowed to change the chat title, photo and other settings */
	public bool $canChangeInfo;

	/** @var bool True, if the user is allowed to invite new users to the chat */
	public bool $canInviteUsers;

	/** @var bool True, if the user is allowed to pin messages */
	public bool $canPinMessages;

	/** @var bool True, if the user is allowed to create forum topics */
	public bool $canManageTopics;

	/** @var bool True, if the user is allowed to send text messages, contacts, locations and venues */
	public bool $canSendMessages;

	/** @var bool True, if the user is allowed to send audios, documents, photos, videos, video notes and voice notes */
	public bool $canSendMediaMessages;

	/** @var bool True, if the user is allowed to send polls */
	public bool $canSendPolls;

	/** @var bool True, if the user is allowed to send animations, games, stickers and use inline bots */
	public bool $canSendOtherMessages;

	/** @var bool True, if the user is allowed to add web page previews to their messages */
	public bool $canAddWebPagePreviews;

	/** @var int Date when restrictions will be lifted for this user; unix time. If 0, then the user is restricted forever */
	public int $untilDate;
}
