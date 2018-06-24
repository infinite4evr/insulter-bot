<?php

	// Bot token obtained from Botfather
	$bot_token  ="524337167:AAFjHn93_toBweBbIxJnLOlRkujK0Scc4Xw"; 

	//optional 
	$dbhost     ="db host";  
	$dbname     ="db name";
	$dbusername ="db username";
	$dbpassword ="db password";

	// Using the TelegramBotPHP library by Eleirbag89 - https://github.com/Eleirbag89/TelegramBotPHP
	require ("Telegram.php");

	$telegram   = new Telegram($bot_token);
	
	$website    ="https://api.telegram.org/bot$bot_token";

	$text       = $telegram->Text();
	$data       = $telegram->getData();
	$query      = $data['inline_query']['query'];
	$username   = $data['inline_query']['from']['username'];
	$first_name = $data['inline_query']['from']['first_name'];
	$last_name  = $data['inline_query']['from']['last_name'];
	$queryid    = $data['inline_query']['id'];
	$language   = $data['inline_query']['from']['language_code'];
	$chat_id    = $telegram->ChatID();


	?>





