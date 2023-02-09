<?php

namespace TelegramApi\Types;

class User implements TypeInterface
{
	/** @var int Unique identifier for this user or bot. This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a 64-bit integer or double-precision float type are safe for storing this identifier. */
	public int $id;

	/** @var bool True, if this user is a bot */
	public bool $isBot;

	/** @var string User's or bot's first name */
	public string $firstName;

	/** @var string|null Optional. User's or bot's last name */
	public ?string $lastName = null;

	/** @var string|null Optional. User's or bot's username */
	public ?string $username = null;

	/** @var string|null Optional. IETF language tag of the user's language */
	public ?string $languageCode = null;

	/** @var bool|null Optional. True, if this user is a Telegram Premium user */
	public ?bool $isPremium = true;

	/** @var bool|null Optional. True, if this user added the bot to the attachment menu */
	public ?bool $addedToAttachmentMenu = true;

	/** @var bool|null Optional. True, if the bot can be invited to groups. Returned only in getMe. */
	public ?bool $canJoinGroups = null;

	/** @var bool|null Optional. True, if privacy mode is disabled for the bot. Returned only in getMe. */
	public ?bool $canReadAllGroupMessages = null;

	/** @var bool|null Optional. True, if the bot supports inline queries. Returned only in getMe. */
	public ?bool $supportsInlineQueries = null;
}
