<?php

namespace TelegramApi\Types;

class PassportElementErrorFiles extends PassportElementError
{
	/** @var string Error source, must be files */
	public string $source = 'files';

	/** @var string The section of the user's Telegram Passport which has the issue, one of “utility_bill”, “bank_statement”, “rental_agreement”, “passport_registration”, “temporary_registration” */
	public string $type;

	/** @var Array<string> List of base64-encoded file hashes */
	public array $fileHashes;

	/** @var string Error message */
	public string $message;
}
