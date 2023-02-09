<?php

namespace TelegramApi\Types;

class InputTextMessageContent extends InputMessageContent
{
	/** @var string Text of the message to be sent, 1-4096 characters */
	public string $messageText;

	/** @var string|null Optional. Mode for parsing entities in the message text. See formatting options for more details. */
	public ?string $parseMode = null;

	/** @var Array<MessageEntity>|null Optional. List of special entities that appear in message text, which can be specified instead of parse_mode */
	public ?array $entities = null;

	/** @var bool|null Optional. Disables link previews for links in the sent message */
	public ?bool $disableWebPagePreview = null;
}
