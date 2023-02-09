<?php

namespace TelegramApi\Types;

class ShippingOption implements TypeInterface
{
	/** @var string Shipping option identifier */
	public string $id;

	/** @var string Option title */
	public string $title;

	/** @var Array<LabeledPrice> List of price portions */
	public array $prices;
}
