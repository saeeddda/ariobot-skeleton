<?php

namespace TelegramApi\Types;

class Game implements TypeInterface
{
	/** @var string Title of the game */
	public string $title;

	/** @var string Description of the game */
	public string $description;

	/** @var Array<PhotoSize> Photo that will be displayed in the game message in chats. */
	public array $photo;

	/** @var string|null Optional. Brief description of the game or high scores included in the game message. Can be automatically edited to include current high scores for the game when the bot calls setGameScore, or manually edited using editMessageText. 0-4096 characters. */
	public ?string $text = null;

	/** @var Array<MessageEntity>|null Optional. Special entities that appear in text, such as usernames, URLs, bot commands, etc. */
	public ?array $textEntities = null;

	/** @var Animation|null Optional. Animation that will be displayed in the game message in chats. Upload via BotFather */
	public ?Animation $animation = null;
}
