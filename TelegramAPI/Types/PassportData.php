<?php

namespace TelegramApi\Types;

class PassportData implements TypeInterface
{
	/** @var Array<EncryptedPassportElement> Array with information about documents and other Telegram Passport elements that was shared with the bot */
	public array $data;

	/** @var EncryptedCredentials Encrypted credentials required to decrypt the data */
	public EncryptedCredentials $credentials;
}
