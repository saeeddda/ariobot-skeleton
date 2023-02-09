<?php

namespace TelegramApi\Types;

class SentWebAppMessage implements TypeInterface
{
	/** @var string|null Optional. Identifier of the sent inline message. Available only if there is an inline keyboard attached to the message. */
	public ?string $inlineMessageId = null;
}
