<?php

namespace TelegramApi\Types;

class MenuButtonWebApp extends MenuButton
{
	/** @var string Type of the button, must be web_app */
	public string $type = 'web_app';

	/** @var string Text on the button */
	public string $text;

	/** @var WebAppInfo Description of the Web App that will be launched when the user presses the button. The Web App will be able to send an arbitrary message on behalf of the user using the method answerWebAppQuery. */
	public WebAppInfo $webApp;
}
