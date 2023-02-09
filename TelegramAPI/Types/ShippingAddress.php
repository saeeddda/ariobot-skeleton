<?php

namespace TelegramApi\Types;

class ShippingAddress implements TypeInterface
{
	/** @var string Two-letter ISO 3166-1 alpha-2 country code */
	public string $countryCode;

	/** @var string State, if applicable */
	public string $state;

	/** @var string City */
	public string $city;

	/** @var string First line for the address */
	public string $streetLine1;

	/** @var string Second line for the address */
	public string $streetLine2;

	/** @var string Address post code */
	public string $postCode;
}
