<?php

namespace TelegramApi\Types;

class InlineQueryResultGame extends InlineQueryResult
{
	/** @var string Type of the result, must be game */
	public string $type = 'game';

	/** @var string Unique identifier for this result, 1-64 bytes */
	public string $id;

	/** @var string Short name of the game */
	public string $gameShortName;

	/** @var InlineKeyboardMarkup|null Optional. Inline keyboard attached to the message */
	public ?InlineKeyboardMarkup $replyMarkup = null;
}
