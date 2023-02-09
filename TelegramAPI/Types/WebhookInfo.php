<?php

namespace TelegramApi\Types;

class WebhookInfo implements TypeInterface
{
	/** @var string Webhook URL, may be empty if webhook is not set up */
	public string $url;

	/** @var bool True, if a custom certificate was provided for webhook certificate checks */
	public bool $hasCustomCertificate;

	/** @var int Number of updates awaiting delivery */
	public int $pendingUpdateCount;

	/** @var string|null Optional. Currently used webhook IP address */
	public ?string $ipAddress = null;

	/** @var int|null Optional. Unix time for the most recent error that happened when trying to deliver an update via webhook */
	public ?int $lastErrorDate = null;

	/** @var string|null Optional. Error message in human-readable format for the most recent error that happened when trying to deliver an update via webhook */
	public ?string $lastErrorMessage = null;

	/** @var int|null Optional. Unix time of the most recent error that happened when trying to synchronize available updates with Telegram datacenters */
	public ?int $lastSynchronizationErrorDate = null;

	/** @var int|null Optional. The maximum allowed number of simultaneous HTTPS connections to the webhook for update delivery */
	public ?int $maxConnections = null;

	/** @var Array<string>|null Optional. A list of update types the bot is subscribed to. Defaults to all update types except chat_member */
	public ?array $allowedUpdates = null;
}
