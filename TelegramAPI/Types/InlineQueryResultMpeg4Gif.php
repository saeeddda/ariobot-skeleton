<?php

namespace TelegramApi\Types;

class InlineQueryResultMpeg4Gif extends InlineQueryResult
{
	/** @var string Type of the result, must be mpeg4_gif */
	public string $type = 'mpeg4_gif';

	/** @var string Unique identifier for this result, 1-64 bytes */
	public string $id;

	/** @var string A valid URL for the MPEG4 file. File size must not exceed 1MB */
	public string $mpeg4Url;

	/** @var int|null Optional. Video width */
	public ?int $mpeg4Width = null;

	/** @var int|null Optional. Video height */
	public ?int $mpeg4Height = null;

	/** @var int|null Optional. Video duration in seconds */
	public ?int $mpeg4Duration = null;

	/** @var string URL of the static (JPEG or GIF) or animated (MPEG4) thumbnail for the result */
	public string $thumbUrl;

	/** @var string|null Optional. MIME type of the thumbnail, must be one of “image/jpeg”, “image/gif”, or “video/mp4”. Defaults to “image/jpeg” */
	public ?string $thumbMimeType = 'image/jpeg';

	/** @var string|null Optional. Title for the result */
	public ?string $title = null;

	/** @var string|null Optional. Caption of the MPEG-4 file to be sent, 0-1024 characters after entities parsing */
	public ?string $caption = null;

	/** @var string|null Optional. Mode for parsing entities in the caption. See formatting options for more details. */
	public ?string $parseMode = null;

	/** @var Array<MessageEntity>|null Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode */
	public ?array $captionEntities = null;

	/** @var InlineKeyboardMarkup|null Optional. Inline keyboard attached to the message */
	public ?InlineKeyboardMarkup $replyMarkup = null;

	/** @var InputMessageContent|null Optional. Content of the message to be sent instead of the video animation */
	public ?InputMessageContent $inputMessageContent = null;
}
