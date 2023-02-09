<?php

namespace TelegramApi\Types;

class Update implements TypeInterface
{
	/** @var int The update's unique identifier. Update identifiers start from a certain positive number and increase sequentially. This ID becomes especially handy if you're using webhooks, since it allows you to ignore repeated updates or to restore the correct update sequence, should they get out of order. If there are no new updates for at least a week, then identifier of the next update will be chosen randomly instead of sequentially. */
	public int $updateId;

	/** @var Message|null Optional. New incoming message of any kind - text, photo, sticker, etc. */
	public ?Message $message = null;

	/** @var Message|null Optional. New version of a message that is known to the bot and was edited */
	public ?Message $editedMessage = null;

	/** @var Message|null Optional. New incoming channel post of any kind - text, photo, sticker, etc. */
	public ?Message $channelPost = null;

	/** @var Message|null Optional. New version of a channel post that is known to the bot and was edited */
	public ?Message $editedChannelPost = null;

	/** @var InlineQuery|null Optional. New incoming inline query */
	public ?InlineQuery $inlineQuery = null;

	/** @var ChosenInlineResult|null Optional. The result of an inline query that was chosen by a user and sent to their chat partner. Please see our documentation on the feedback collecting for details on how to enable these updates for your bot. */
	public ?ChosenInlineResult $chosenInlineResult = null;

	/** @var CallbackQuery|null Optional. New incoming callback query */
	public ?CallbackQuery $callbackQuery = null;

	/** @var ShippingQuery|null Optional. New incoming shipping query. Only for invoices with flexible price */
	public ?ShippingQuery $shippingQuery = null;

	/** @var PreCheckoutQuery|null Optional. New incoming pre-checkout query. Contains full information about checkout */
	public ?PreCheckoutQuery $preCheckoutQuery = null;

	/** @var Poll|null Optional. New poll state. Bots receive only updates about stopped polls and polls, which are sent by the bot */
	public ?Poll $poll = null;

	/** @var PollAnswer|null Optional. A user changed their answer in a non-anonymous poll. Bots receive new votes only in polls that were sent by the bot itself. */
	public ?PollAnswer $pollAnswer = null;

	/** @var ChatMemberUpdated|null Optional. The bot's chat member status was updated in a chat. For private chats, this update is received only when the bot is blocked or unblocked by the user. */
	public ?ChatMemberUpdated $myChatMember = null;

	/** @var ChatMemberUpdated|null Optional. A chat member's status was updated in a chat. The bot must be an administrator in the chat and must explicitly specify “chat_member” in the list of allowed_updates to receive these updates. */
	public ?ChatMemberUpdated $chatMember = null;

	/** @var ChatJoinRequest|null Optional. A request to join the chat has been sent. The bot must have the can_invite_users administrator right in the chat to receive these updates. */
	public ?ChatJoinRequest $chatJoinRequest = null;
}
