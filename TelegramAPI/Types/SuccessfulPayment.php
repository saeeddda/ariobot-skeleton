<?php

namespace TelegramApi\Types;

class SuccessfulPayment implements TypeInterface
{
	/** @var string Three-letter ISO 4217 currency code */
	public string $currency;

	/** @var int Total price in the smallest units of the currency (integer, not float/double). For example, for a price of US$ 1.45 pass amount = 145. See the exp parameter in currencies.json, it shows the number of digits past the decimal point for each currency (2 for the majority of currencies). */
	public int $totalAmount;

	/** @var string Bot specified invoice payload */
	public string $invoicePayload;

	/** @var string|null Optional. Identifier of the shipping option chosen by the user */
	public ?string $shippingOptionId = null;

	/** @var OrderInfo|null Optional. Order information provided by the user */
	public ?OrderInfo $orderInfo = null;

	/** @var string Telegram payment identifier */
	public string $telegramPaymentChargeId;

	/** @var string Provider payment identifier */
	public string $providerPaymentChargeId;
}
