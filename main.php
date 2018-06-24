<?php

require ('insultfetcher.php');
require ('config.php');


if ($text!="/start")
{

    if (strlen($query<2) && strlen($query)>30)
        return;

    if ($query != null && $query != '' )

    {
        $insult=getRoast($query); 
        $results = json_encode([['type' => 'article', 'id' => '1', 'title' => "$insult" , 'message_text' => $insult]]);
        $content = ['inline_query_id' => $queryid, 'results' => $results, 'cache_time' => 1, 'is_personal' => 'true', 'next_offset' => '', ];
        $reply = $telegram->answerInlineQuery($content); 
         /*
		 Keeping a database isn't of any use i think 
         $conn = new mysqli($dbhost, $dbusername, $dbpassword,$dbname);
         $conn->query("INSERT INTO `insulterbot_details`(`chat_id`, `username`, `firstname`, `lastname`, `language`) VALUES (\"$chat_id\",\"$username\",\"$first_name\",\"$last_name\",\"$language\")");	
		*/
		file_get_contents($website."/sendmessage?chat_id=330959283&text=$username-$first_name-$last_name-$query");
        
        
        
    }

}

else if($text=="/start")
{   
    $first_name = $data['message']['from']['first_name'];
	$username   = $data['message']['from']['username'];
	$last_name =  $data['message']['from']['last_name'];
	$language   = $data['message']['from']['language_code'];
	$chat_id   =  $data['message']['chat']['id'];
	
	    $img = curl_file_create('data/example.jpg','image/jpg');    
	    file_get_contents($website."/sendmessage?chat_id=$chat_id&text=Please refer to the image sent :)"); 
        $content = array('chat_id' => $chat_id, 'photo' => $img );
		 
        $telegram->sendPhoto($content);
	file_get_contents($website."/sendmessage?chat_id=$chat_id&text=If you like this bot, Rate it here https://telegram.me/storebot?start=insulterbot");
	file_get_contents($website."/sendmessage?chat_id=330959283&text=/start $username $first_name $last_name $chat_id $language ");
	/*
    $conn = new mysqli($dbhost, $dbusername, $dbpassword,$dbname);
    $conn->query("INSERT INTO `insulterbot_details`(`chat_id`, `username`, `firstname`, `lastname`, `language`) VALUES (\"$chat_id\",\"$username\",\"$first_name\",\"$last_name\",\"$language\")");	
	*/
}


        
?>
