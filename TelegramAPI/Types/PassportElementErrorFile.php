<?php

namespace TelegramApi\Types;

class PassportElementErrorFile extends PassportElementError
{
	/** @var string Error source, must be file */
	public string $source = 'file';

	/** @var string The section of the user's Telegram Passport which has the issue, one of “utility_bill”, “bank_statement”, “rental_agreement”, “passport_registration”, “temporary_registration” */
	public string $type;

	/** @var string Base64-encoded file hash */
	public string $fileHash;

	/** @var string Error message */
	public string $message;
}
