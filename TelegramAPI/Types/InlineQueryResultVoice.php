<?php

namespace TelegramApi\Types;

class InlineQueryResultVoice extends InlineQueryResult
{
	/** @var string Type of the result, must be voice */
	public string $type = 'voice';

	/** @var string Unique identifier for this result, 1-64 bytes */
	public string $id;

	/** @var string A valid URL for the voice recording */
	public string $voiceUrl;

	/** @var string Recording title */
	public string $title;

	/** @var string|null Optional. Caption, 0-1024 characters after entities parsing */
	public ?string $caption = null;

	/** @var string|null Optional. Mode for parsing entities in the voice message caption. See formatting options for more details. */
	public ?string $parseMode = null;

	/** @var Array<MessageEntity>|null Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode */
	public ?array $captionEntities = null;

	/** @var int|null Optional. Recording duration in seconds */
	public ?int $voiceDuration = null;

	/** @var InlineKeyboardMarkup|null Optional. Inline keyboard attached to the message */
	public ?InlineKeyboardMarkup $replyMarkup = null;

	/** @var InputMessageContent|null Optional. Content of the message to be sent instead of the voice recording */
	public ?InputMessageContent $inputMessageContent = null;
}
