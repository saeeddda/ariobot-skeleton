<?php

namespace TelegramApi\Types;

class Message implements TypeInterface
{
	/** @var int Unique message identifier inside this chat */
	public int $messageId;

	/** @var int|null Optional. Unique identifier of a message thread to which the message belongs; for supergroups only */
	public ?int $messageThreadId = null;

	/** @var User|null Optional. Sender of the message; empty for messages sent to channels. For backward compatibility, the field contains a fake sender user in non-channel chats, if the message was sent on behalf of a chat. */
	public ?User $from = null;

	/** @var Chat|null Optional. Sender of the message, sent on behalf of a chat. For example, the channel itself for channel posts, the supergroup itself for messages from anonymous group administrators, the linked channel for messages automatically forwarded to the discussion group. For backward compatibility, the field from contains a fake sender user in non-channel chats, if the message was sent on behalf of a chat. */
	public ?Chat $senderChat = null;

	/** @var int Date the message was sent in Unix time */
	public int $date;

	/** @var Chat Conversation the message belongs to */
	public Chat $chat;

	/** @var User|null Optional. For forwarded messages, sender of the original message */
	public ?User $forwardFrom = null;

	/** @var Chat|null Optional. For messages forwarded from channels or from anonymous administrators, information about the original sender chat */
	public ?Chat $forwardFromChat = null;

	/** @var int|null Optional. For messages forwarded from channels, identifier of the original message in the channel */
	public ?int $forwardFromMessageId = null;

	/** @var string|null Optional. For forwarded messages that were originally sent in channels or by an anonymous chat administrator, signature of the message sender if present */
	public ?string $forwardSignature = null;

	/** @var string|null Optional. Sender's name for messages forwarded from users who disallow adding a link to their account in forwarded messages */
	public ?string $forwardSenderName = null;

	/** @var int|null Optional. For forwarded messages, date the original message was sent in Unix time */
	public ?int $forwardDate = null;

	/** @var bool|null Optional. True, if the message is sent to a forum topic */
	public ?bool $isTopicMessage = true;

	/** @var bool|null Optional. True, if the message is a channel post that was automatically forwarded to the connected discussion group */
	public ?bool $isAutomaticForward = true;

	/** @var Message|null Optional. For replies, the original message. Note that the Message object in this field will not contain further reply_to_message fields even if it itself is a reply. */
	public ?Message $replyToMessage = null;

	/** @var User|null Optional. Bot through which the message was sent */
	public ?User $viaBot = null;

	/** @var int|null Optional. Date the message was last edited in Unix time */
	public ?int $editDate = null;

	/** @var bool|null Optional. True, if the message can't be forwarded */
	public ?bool $hasProtectedContent = true;

	/** @var string|null Optional. The unique identifier of a media message group this message belongs to */
	public ?string $mediaGroupId = null;

	/** @var string|null Optional. Signature of the post author for messages in channels, or the custom title of an anonymous group administrator */
	public ?string $authorSignature = null;

	/** @var string|null Optional. For text messages, the actual UTF-8 text of the message */
	public ?string $text = null;

	/** @var Array<MessageEntity>|null Optional. For text messages, special entities like usernames, URLs, bot commands, etc. that appear in the text */
	public ?array $entities = null;

	/** @var Animation|null Optional. Message is an animation, information about the animation. For backward compatibility, when this field is set, the document field will also be set */
	public ?Animation $animation = null;

	/** @var Audio|null Optional. Message is an audio file, information about the file */
	public ?Audio $audio = null;

	/** @var Document|null Optional. Message is a general file, information about the file */
	public ?Document $document = null;

	/** @var Array<PhotoSize>|null Optional. Message is a photo, available sizes of the photo */
	public ?array $photo = null;

	/** @var Sticker|null Optional. Message is a sticker, information about the sticker */
	public ?Sticker $sticker = null;

	/** @var Video|null Optional. Message is a video, information about the video */
	public ?Video $video = null;

	/** @var VideoNote|null Optional. Message is a video note, information about the video message */
	public ?VideoNote $videoNote = null;

	/** @var Voice|null Optional. Message is a voice message, information about the file */
	public ?Voice $voice = null;

	/** @var string|null Optional. Caption for the animation, audio, document, photo, video or voice */
	public ?string $caption = null;

	/** @var Array<MessageEntity>|null Optional. For messages with a caption, special entities like usernames, URLs, bot commands, etc. that appear in the caption */
	public ?array $captionEntities = null;

	/** @var Contact|null Optional. Message is a shared contact, information about the contact */
	public ?Contact $contact = null;

	/** @var Dice|null Optional. Message is a dice with random value */
	public ?Dice $dice = null;

	/** @var Game|null Optional. Message is a game, information about the game. More about games » */
	public ?Game $game = null;

	/** @var Poll|null Optional. Message is a native poll, information about the poll */
	public ?Poll $poll = null;

	/** @var Venue|null Optional. Message is a venue, information about the venue. For backward compatibility, when this field is set, the location field will also be set */
	public ?Venue $venue = null;

	/** @var Location|null Optional. Message is a shared location, information about the location */
	public ?Location $location = null;

	/** @var Array<User>|null Optional. New members that were added to the group or supergroup and information about them (the bot itself may be one of these members) */
	public ?array $newChatMembers = null;

	/** @var User|null Optional. A member was removed from the group, information about them (this member may be the bot itself) */
	public ?User $leftChatMember = null;

	/** @var string|null Optional. A chat title was changed to this value */
	public ?string $newChatTitle = null;

	/** @var Array<PhotoSize>|null Optional. A chat photo was change to this value */
	public ?array $newChatPhoto = null;

	/** @var bool|null Optional. Service message: the chat photo was deleted */
	public ?bool $deleteChatPhoto = true;

	/** @var bool|null Optional. Service message: the group has been created */
	public ?bool $groupChatCreated = true;

	/** @var bool|null Optional. Service message: the supergroup has been created. This field can't be received in a message coming through updates, because bot can't be a member of a supergroup when it is created. It can only be found in reply_to_message if someone replies to a very first message in a directly created supergroup. */
	public ?bool $supergroupChatCreated = true;

	/** @var bool|null Optional. Service message: the channel has been created. This field can't be received in a message coming through updates, because bot can't be a member of a channel when it is created. It can only be found in reply_to_message if someone replies to a very first message in a channel. */
	public ?bool $channelChatCreated = true;

	/** @var MessageAutoDeleteTimerChanged|null Optional. Service message: auto-delete timer settings changed in the chat */
	public ?MessageAutoDeleteTimerChanged $messageAutoDeleteTimerChanged = null;

	/** @var int|null Optional. The group has been migrated to a supergroup with the specified identifier. This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe for storing this identifier. */
	public ?int $migrateToChatId = null;

	/** @var int|null Optional. The supergroup has been migrated from a group with the specified identifier. This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe for storing this identifier. */
	public ?int $migrateFromChatId = null;

	/** @var Message|null Optional. Specified message was pinned. Note that the Message object in this field will not contain further reply_to_message fields even if it is itself a reply. */
	public ?Message $pinnedMessage = null;

	/** @var Invoice|null Optional. Message is an invoice for a payment, information about the invoice. More about payments » */
	public ?Invoice $invoice = null;

	/** @var SuccessfulPayment|null Optional. Message is a service message about a successful payment, information about the payment. More about payments » */
	public ?SuccessfulPayment $successfulPayment = null;

	/** @var string|null Optional. The domain name of the website on which the user has logged in. More about Telegram Login » */
	public ?string $connectedWebsite = null;

	/** @var PassportData|null Optional. Telegram Passport data */
	public ?PassportData $passportData = null;

	/** @var ProximityAlertTriggered|null Optional. Service message. A user in the chat triggered another user's proximity alert while sharing Live Location. */
	public ?ProximityAlertTriggered $proximityAlertTriggered = null;

	/** @var ForumTopicCreated|null Optional. Service message: forum topic created */
	public ?ForumTopicCreated $forumTopicCreated = null;

	/** @var ForumTopicClosed|null Optional. Service message: forum topic closed */
	public ?ForumTopicClosed $forumTopicClosed = null;

	/** @var ForumTopicReopened|null Optional. Service message: forum topic reopened */
	public ?ForumTopicReopened $forumTopicReopened = null;

	/** @var VideoChatScheduled|null Optional. Service message: video chat scheduled */
	public ?VideoChatScheduled $videoChatScheduled = null;

	/** @var VideoChatStarted|null Optional. Service message: video chat started */
	public ?VideoChatStarted $videoChatStarted = null;

	/** @var VideoChatEnded|null Optional. Service message: video chat ended */
	public ?VideoChatEnded $videoChatEnded = null;

	/** @var VideoChatParticipantsInvited|null Optional. Service message: new participants invited to a video chat */
	public ?VideoChatParticipantsInvited $videoChatParticipantsInvited = null;

	/** @var WebAppData|null Optional. Service message: data sent by a Web App */
	public ?WebAppData $webAppData = null;

	/** @var InlineKeyboardMarkup|null Optional. Inline keyboard attached to the message. login_url buttons are represented as ordinary url buttons. */
	public ?InlineKeyboardMarkup $replyMarkup = null;
}
