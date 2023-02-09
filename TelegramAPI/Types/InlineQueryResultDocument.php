<?php

namespace TelegramApi\Types;

class InlineQueryResultDocument extends InlineQueryResult
{
	/** @var string Type of the result, must be document */
	public string $type = 'document';

	/** @var string Unique identifier for this result, 1-64 bytes */
	public string $id;

	/** @var string Title for the result */
	public string $title;

	/** @var string|null Optional. Caption of the document to be sent, 0-1024 characters after entities parsing */
	public ?string $caption = null;

	/** @var string|null Optional. Mode for parsing entities in the document caption. See formatting options for more details. */
	public ?string $parseMode = null;

	/** @var Array<MessageEntity>|null Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode */
	public ?array $captionEntities = null;

	/** @var string A valid URL for the file */
	public string $documentUrl;

	/** @var string MIME type of the content of the file, either “application/pdf” or “application/zip” */
	public string $mimeType;

	/** @var string|null Optional. Short description of the result */
	public ?string $description = null;

	/** @var InlineKeyboardMarkup|null Optional. Inline keyboard attached to the message */
	public ?InlineKeyboardMarkup $replyMarkup = null;

	/** @var InputMessageContent|null Optional. Content of the message to be sent instead of the file */
	public ?InputMessageContent $inputMessageContent = null;

	/** @var string|null Optional. URL of the thumbnail (JPEG only) for the file */
	public ?string $thumbUrl = null;

	/** @var int|null Optional. Thumbnail width */
	public ?int $thumbWidth = null;

	/** @var int|null Optional. Thumbnail height */
	public ?int $thumbHeight = null;
}
