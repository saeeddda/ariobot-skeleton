<?php

namespace TelegramApi\Types;

class ChatAdministratorRights implements TypeInterface
{
	/** @var bool True, if the user's presence in the chat is hidden */
	public bool $isAnonymous;

	/** @var bool True, if the administrator can access the chat event log, chat statistics, message statistics in channels, see channel members, see anonymous administrators in supergroups and ignore slow mode. Implied by any other administrator privilege */
	public bool $canManageChat;

	/** @var bool True, if the administrator can delete messages of other users */
	public bool $canDeleteMessages;

	/** @var bool True, if the administrator can manage video chats */
	public bool $canManageVideoChats;

	/** @var bool True, if the administrator can restrict, ban or unban chat members */
	public bool $canRestrictMembers;

	/** @var bool True, if the administrator can add new administrators with a subset of their own privileges or demote administrators that he has promoted, directly or indirectly (promoted by administrators that were appointed by the user) */
	public bool $canPromoteMembers;

	/** @var bool True, if the user is allowed to change the chat title, photo and other settings */
	public bool $canChangeInfo;

	/** @var bool True, if the user is allowed to invite new users to the chat */
	public bool $canInviteUsers;

	/** @var bool|null Optional. True, if the administrator can post in the channel; channels only */
	public ?bool $canPostMessages = null;

	/** @var bool|null Optional. True, if the administrator can edit messages of other users and can pin messages; channels only */
	public ?bool $canEditMessages = null;

	/** @var bool|null Optional. True, if the user is allowed to pin messages; groups and supergroups only */
	public ?bool $canPinMessages = null;

	/** @var bool|null Optional. True, if the user is allowed to create, rename, close, and reopen forum topics; supergroups only */
	public ?bool $canManageTopics = null;
}
