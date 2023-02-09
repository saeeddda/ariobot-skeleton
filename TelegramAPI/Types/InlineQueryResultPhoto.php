<?php

namespace TelegramApi\Types;

class InlineQueryResultPhoto extends InlineQueryResult
{
	/** @var string Type of the result, must be photo */
	public string $type = 'photo';

	/** @var string Unique identifier for this result, 1-64 bytes */
	public string $id;

	/** @var string A valid URL of the photo. Photo must be in JPEG format. Photo size must not exceed 5MB */
	public string $photoUrl;

	/** @var string URL of the thumbnail for the photo */
	public string $thumbUrl;

	/** @var int|null Optional. Width of the photo */
	public ?int $photoWidth = null;

	/** @var int|null Optional. Height of the photo */
	public ?int $photoHeight = null;

	/** @var string|null Optional. Title for the result */
	public ?string $title = null;

	/** @var string|null Optional. Short description of the result */
	public ?string $description = null;

	/** @var string|null Optional. Caption of the photo to be sent, 0-1024 characters after entities parsing */
	public ?string $caption = null;

	/** @var string|null Optional. Mode for parsing entities in the photo caption. See formatting options for more details. */
	public ?string $parseMode = null;

	/** @var Array<MessageEntity>|null Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode */
	public ?array $captionEntities = null;

	/** @var InlineKeyboardMarkup|null Optional. Inline keyboard attached to the message */
	public ?InlineKeyboardMarkup $replyMarkup = null;

	/** @var InputMessageContent|null Optional. Content of the message to be sent instead of the photo */
	public ?InputMessageContent $inputMessageContent = null;
}
