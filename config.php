<?php

// Bot token obtained from Botfather
$bot_token = 'Bottoken';
/*
 * $dbhost     ="db host";
 * $dbname     ="db name";
 * $dbusername ="db username";
 * $dbpassword ="db password";
 * Using the TelegramBotPHP library by Eleirbag89 - https://github.com/Eleirbag89/TelegramBotPHP
 * Is not that bad
 */
require 'Telegram.php';
$telegram = new Telegram($bot_token);
$website = "https://api.telegram.org/bot${bot_token}";
$data = $telegram->getData();
