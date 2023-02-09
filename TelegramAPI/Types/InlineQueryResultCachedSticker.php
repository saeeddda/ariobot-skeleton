<?php

namespace TelegramApi\Types;

class InlineQueryResultCachedSticker extends InlineQueryResult
{
	/** @var string Type of the result, must be sticker */
	public string $type = 'sticker';

	/** @var string Unique identifier for this result, 1-64 bytes */
	public string $id;

	/** @var string A valid file identifier of the sticker */
	public string $stickerFileId;

	/** @var InlineKeyboardMarkup|null Optional. Inline keyboard attached to the message */
	public ?InlineKeyboardMarkup $replyMarkup = null;

	/** @var InputMessageContent|null Optional. Content of the message to be sent instead of the sticker */
	public ?InputMessageContent $inputMessageContent = null;
}
