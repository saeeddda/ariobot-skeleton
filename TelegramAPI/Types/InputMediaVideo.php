<?php

namespace TelegramApi\Types;

class InputMediaVideo extends InputMedia
{
	/** @var string Type of the result, must be video */
	public string $type = 'video';

	/** @var string File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended), pass an HTTP URL for Telegram to get a file from the Internet, or pass “attach://<file_attach_name>” to upload a new one using multipart/form-data under <file_attach_name> name. More information on Sending Files » */
	public string $media;

	/** @var InputFile|string|null Optional. Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported server-side. The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's width and height should not exceed 320. Ignored if the file is not uploaded using multipart/form-data. Thumbnails can't be reused and can be only uploaded as a new file, so you can pass “attach://<file_attach_name>” if the thumbnail was uploaded using multipart/form-data under <file_attach_name>. More information on Sending Files » */
	public InputFile|string|null $thumb = null;

	/** @var string|null Optional. Caption of the video to be sent, 0-1024 characters after entities parsing */
	public ?string $caption = null;

	/** @var string|null Optional. Mode for parsing entities in the video caption. See formatting options for more details. */
	public ?string $parseMode = null;

	/** @var Array<MessageEntity>|null Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode */
	public ?array $captionEntities = null;

	/** @var int|null Optional. Video width */
	public ?int $width = null;

	/** @var int|null Optional. Video height */
	public ?int $height = null;

	/** @var int|null Optional. Video duration in seconds */
	public ?int $duration = null;

	/** @var bool|null Optional. Pass True if the uploaded video is suitable for streaming */
	public ?bool $supportsStreaming = null;
}
