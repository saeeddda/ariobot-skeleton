<?php

namespace TelegramApi\Types;

class ChatPermissions implements TypeInterface
{
	/** @var bool|null Optional. True, if the user is allowed to send text messages, contacts, locations and venues */
	public ?bool $canSendMessages = null;

	/** @var bool|null Optional. True, if the user is allowed to send audios, documents, photos, videos, video notes and voice notes, implies can_send_messages */
	public ?bool $canSendMediaMessages = null;

	/** @var bool|null Optional. True, if the user is allowed to send polls, implies can_send_messages */
	public ?bool $canSendPolls = null;

	/** @var bool|null Optional. True, if the user is allowed to send animations, games, stickers and use inline bots, implies can_send_media_messages */
	public ?bool $canSendOtherMessages = null;

	/** @var bool|null Optional. True, if the user is allowed to add web page previews to their messages, implies can_send_media_messages */
	public ?bool $canAddWebPagePreviews = null;

	/** @var bool|null Optional. True, if the user is allowed to change the chat title, photo and other settings. Ignored in public supergroups */
	public ?bool $canChangeInfo = null;

	/** @var bool|null Optional. True, if the user is allowed to invite new users to the chat */
	public ?bool $canInviteUsers = null;

	/** @var bool|null Optional. True, if the user is allowed to pin messages. Ignored in public supergroups */
	public ?bool $canPinMessages = null;

	/** @var bool|null Optional. True, if the user is allowed to create forum topics. If omitted defaults to the value of can_pin_messages */
	public ?bool $canManageTopics = null;
}
