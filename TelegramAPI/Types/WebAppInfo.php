<?php

namespace TelegramApi\Types;

class WebAppInfo implements TypeInterface
{
	/** @var string An HTTPS URL of a Web App to be opened with additional data as specified in Initializing Web Apps */
	public string $url;
}
