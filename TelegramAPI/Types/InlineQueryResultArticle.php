<?php

namespace TelegramApi\Types;

class InlineQueryResultArticle extends InlineQueryResult
{
	/** @var string Type of the result, must be article */
	public string $type = 'article';

	/** @var string Unique identifier for this result, 1-64 Bytes */
	public string $id;

	/** @var string Title of the result */
	public string $title;

	/** @var InputMessageContent Content of the message to be sent */
	public InputMessageContent $inputMessageContent;

	/** @var InlineKeyboardMarkup|null Optional. Inline keyboard attached to the message */
	public ?InlineKeyboardMarkup $replyMarkup = null;

	/** @var string|null Optional. URL of the result */
	public ?string $url = null;

	/** @var bool|null Optional. Pass True if you don't want the URL to be shown in the message */
	public ?bool $hideUrl = null;

	/** @var string|null Optional. Short description of the result */
	public ?string $description = null;

	/** @var string|null Optional. Url of the thumbnail for the result */
	public ?string $thumbUrl = null;

	/** @var int|null Optional. Thumbnail width */
	public ?int $thumbWidth = null;

	/** @var int|null Optional. Thumbnail height */
	public ?int $thumbHeight = null;
}
