<?php

namespace TelegramApi\Types;

class ShippingQuery implements TypeInterface
{
	/** @var string Unique query identifier */
	public string $id;

	/** @var User User who sent the query */
	public User $from;

	/** @var string Bot specified invoice payload */
	public string $invoicePayload;

	/** @var ShippingAddress User specified shipping address */
	public ShippingAddress $shippingAddress;
}
