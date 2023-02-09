<?php

namespace TelegramApi\Types;

class PassportElementErrorUnspecified extends PassportElementError
{
	/** @var string Error source, must be unspecified */
	public string $source = 'unspecified';

	/** @var string Type of element of the user's Telegram Passport which has the issue */
	public string $type;

	/** @var string Base64-encoded element hash */
	public string $elementHash;

	/** @var string Error message */
	public string $message;
}
