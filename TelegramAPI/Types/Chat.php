<?php

namespace TelegramApi\Types;

class Chat implements TypeInterface
{
	/** @var int Unique identifier for this chat. This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe for storing this identifier. */
	public int $id;

	/** @var string Type of chat, can be either “private”, “group”, “supergroup” or “channel” */
	public string $type;

	/** @var string|null Optional. Title, for supergroups, channels and group chats */
	public ?string $title = null;

	/** @var string|null Optional. Username, for private chats, supergroups and channels if available */
	public ?string $username = null;

	/** @var string|null Optional. First name of the other party in a private chat */
	public ?string $firstName = null;

	/** @var string|null Optional. Last name of the other party in a private chat */
	public ?string $lastName = null;

	/** @var bool|null Optional. True, if the supergroup chat is a forum (has topics enabled) */
	public ?bool $isForum = true;

	/** @var ChatPhoto|null Optional. Chat photo. Returned only in getChat. */
	public ?ChatPhoto $photo = null;

	/** @var Array<string>|null Optional. If non-empty, the list of all active chat usernames; for private chats, supergroups and channels. Returned only in getChat. */
	public ?array $activeUsernames = null;

	/** @var string|null Optional. Custom emoji identifier of emoji status of the other party in a private chat. Returned only in getChat. */
	public ?string $emojiStatusCustomEmojiId = null;

	/** @var string|null Optional. Bio of the other party in a private chat. Returned only in getChat. */
	public ?string $bio = null;

	/** @var bool|null Optional. True, if privacy settings of the other party in the private chat allows to use tg://user?id=<user_id> links only in chats with the user. Returned only in getChat. */
	public ?bool $hasPrivateForwards = true;

	/** @var bool|null Optional. True, if the privacy settings of the other party restrict sending voice and video note messages in the private chat. Returned only in getChat. */
	public ?bool $hasRestrictedVoiceAndVideoMessages = true;

	/** @var bool|null Optional. True, if users need to join the supergroup before they can send messages. Returned only in getChat. */
	public ?bool $joinToSendMessages = true;

	/** @var bool|null Optional. True, if all users directly joining the supergroup need to be approved by supergroup administrators. Returned only in getChat. */
	public ?bool $joinByRequest = true;

	/** @var string|null Optional. Description, for groups, supergroups and channel chats. Returned only in getChat. */
	public ?string $description = null;

	/** @var string|null Optional. Primary invite link, for groups, supergroups and channel chats. Returned only in getChat. */
	public ?string $inviteLink = null;

	/** @var Message|null Optional. The most recent pinned message (by sending date). Returned only in getChat. */
	public ?Message $pinnedMessage = null;

	/** @var ChatPermissions|null Optional. Default chat member permissions, for groups and supergroups. Returned only in getChat. */
	public ?ChatPermissions $permissions = null;

	/** @var int|null Optional. For supergroups, the minimum allowed delay between consecutive messages sent by each unpriviledged user; in seconds. Returned only in getChat. */
	public ?int $slowModeDelay = null;

	/** @var int|null Optional. The time after which all messages sent to the chat will be automatically deleted; in seconds. Returned only in getChat. */
	public ?int $messageAutoDeleteTime = null;

	/** @var bool|null Optional. True, if messages from the chat can't be forwarded to other chats. Returned only in getChat. */
	public ?bool $hasProtectedContent = true;

	/** @var string|null Optional. For supergroups, name of group sticker set. Returned only in getChat. */
	public ?string $stickerSetName = null;

	/** @var bool|null Optional. True, if the bot can change the group sticker set. Returned only in getChat. */
	public ?bool $canSetStickerSet = true;

	/** @var int|null Optional. Unique identifier for the linked chat, i.e. the discussion group identifier for a channel and vice versa; for supergroups and channel chats. This identifier may be greater than 32 bits and some programming languages may have difficulty/silent defects in interpreting it. But it is smaller than 52 bits, so a signed 64 bit integer or double-precision float type are safe for storing this identifier. Returned only in getChat. */
	public ?int $linkedChatId = null;

	/** @var ChatLocation|null Optional. For supergroups, the location to which the supergroup is connected. Returned only in getChat. */
	public ?ChatLocation $location = null;
}