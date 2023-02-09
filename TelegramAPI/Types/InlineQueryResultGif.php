<?php

namespace TelegramApi\Types;

class InlineQueryResultGif extends InlineQueryResult
{
	/** @var string Type of the result, must be gif */
	public string $type = 'gif';

	/** @var string Unique identifier for this result, 1-64 bytes */
	public string $id;

	/** @var string A valid URL for the GIF file. File size must not exceed 1MB */
	public string $gifUrl;

	/** @var int|null Optional. Width of the GIF */
	public ?int $gifWidth = null;

	/** @var int|null Optional. Height of the GIF */
	public ?int $gifHeight = null;

	/** @var int|null Optional. Duration of the GIF in seconds */
	public ?int $gifDuration = null;

	/** @var string URL of the static (JPEG or GIF) or animated (MPEG4) thumbnail for the result */
	public string $thumbUrl;

	/** @var string|null Optional. MIME type of the thumbnail, must be one of “image/jpeg”, “image/gif”, or “video/mp4”. Defaults to “image/jpeg” */
	public ?string $thumbMimeType = 'image/jpeg';

	/** @var string|null Optional. Title for the result */
	public ?string $title = null;

	/** @var string|null Optional. Caption of the GIF file to be sent, 0-1024 characters after entities parsing */
	public ?string $caption = null;

	/** @var string|null Optional. Mode for parsing entities in the caption. See formatting options for more details. */
	public ?string $parseMode = null;

	/** @var Array<MessageEntity>|null Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode */
	public ?array $captionEntities = null;

	/** @var InlineKeyboardMarkup|null Optional. Inline keyboard attached to the message */
	public ?InlineKeyboardMarkup $replyMarkup = null;

	/** @var InputMessageContent|null Optional. Content of the message to be sent instead of the GIF animation */
	public ?InputMessageContent $inputMessageContent = null;
}
