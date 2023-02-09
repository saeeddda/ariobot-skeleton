<?php

namespace TelegramApi\Types;

class OrderInfo implements TypeInterface
{
	/** @var string|null Optional. User name */
	public ?string $name = null;

	/** @var string|null Optional. User's phone number */
	public ?string $phoneNumber = null;

	/** @var string|null Optional. User email */
	public ?string $email = null;

	/** @var ShippingAddress|null Optional. User shipping address */
	public ?ShippingAddress $shippingAddress = null;
}
