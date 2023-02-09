<?php

namespace TelegramApi\Types;

class InlineQueryResultContact extends InlineQueryResult
{
	/** @var string Type of the result, must be contact */
	public string $type = 'contact';

	/** @var string Unique identifier for this result, 1-64 Bytes */
	public string $id;

	/** @var string Contact's phone number */
	public string $phoneNumber;

	/** @var string Contact's first name */
	public string $firstName;

	/** @var string|null Optional. Contact's last name */
	public ?string $lastName = null;

	/** @var string|null Optional. Additional data about the contact in the form of a vCard, 0-2048 bytes */
	public ?string $vcard = null;

	/** @var InlineKeyboardMarkup|null Optional. Inline keyboard attached to the message */
	public ?InlineKeyboardMarkup $replyMarkup = null;

	/** @var InputMessageContent|null Optional. Content of the message to be sent instead of the contact */
	public ?InputMessageContent $inputMessageContent = null;

	/** @var string|null Optional. Url of the thumbnail for the result */
	public ?string $thumbUrl = null;

	/** @var int|null Optional. Thumbnail width */
	public ?int $thumbWidth = null;

	/** @var int|null Optional. Thumbnail height */
	public ?int $thumbHeight = null;
}
