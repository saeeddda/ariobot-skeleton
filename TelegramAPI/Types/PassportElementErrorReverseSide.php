<?php

namespace TelegramApi\Types;

class PassportElementErrorReverseSide extends PassportElementError
{
	/** @var string Error source, must be reverse_side */
	public string $source = 'reverse_side';

	/** @var string The section of the user's Telegram Passport which has the issue, one of “driver_license”, “identity_card” */
	public string $type;

	/** @var string Base64-encoded hash of the file with the reverse side of the document */
	public string $fileHash;

	/** @var string Error message */
	public string $message;
}
