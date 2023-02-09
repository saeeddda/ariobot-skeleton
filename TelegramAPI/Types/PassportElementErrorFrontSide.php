<?php

namespace TelegramApi\Types;

class PassportElementErrorFrontSide extends PassportElementError
{
	/** @var string Error source, must be front_side */
	public string $source = 'front_side';

	/** @var string The section of the user's Telegram Passport which has the issue, one of “passport”, “driver_license”, “identity_card”, “internal_passport” */
	public string $type;

	/** @var string Base64-encoded hash of the file with the front side of the document */
	public string $fileHash;

	/** @var string Error message */
	public string $message;
}
