<?php

namespace TelegramApi\Types;

class WebAppData implements TypeInterface
{
	/** @var string The data. Be aware that a bad client can send arbitrary data in this field. */
	public string $data;

	/** @var string Text of the web_app keyboard button from which the Web App was opened. Be aware that a bad client can send arbitrary data in this field. */
	public string $buttonText;
}
