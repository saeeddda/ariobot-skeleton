<?php

namespace TelegramApi\Types;

class ChatLocation implements TypeInterface
{
	/** @var Location The location to which the supergroup is connected. Can't be a live location. */
	public Location $location;

	/** @var string Location address; 1-64 characters, as defined by the chat owner */
	public string $address;
}
