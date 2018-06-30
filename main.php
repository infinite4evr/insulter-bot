<?php
require ('config.php');

if ($text!="/start")
{

    if (strlen($query<2) && strlen($query)>30)
        return;

    if ($query != null && $query != '' )

    {
		require ("Insult/insultfetcher0.php");
		require ("Insult/insultfetcher1.php");
		require ("Insult/insultfetcher2.php");
		require ("Insult/insultfetcher3.php");
		require ("Insult/insultfetcher4.php");
		
        $insult0 =getRoast0($query); 
		$insult1 =getRoast1($query);
		$insult2 =getRoast2($query);
		$insult3 =getRoast3();
		$insult4 =getRoast4();
		
        $results = json_encode([['type' => 'article', 'id' => '1', 'title' => "$insult0" , 'message_text' => $insult0],['type' => 'article', 'id' => '2', 'title' => "$insult3" , 'message_text' => $insult3],['type' => 'article', 'id' => '3', 'title' => "$insult2" , 'message_text' => $insult2],['type' => 'article', 'id' => '4', 'title' => "$insult4" , 'message_text' => $insult4],['type' => 'article', 'id' => '5', 'title' => "$insult1" , 'message_text' => $insult1]]);
				
        $content = ['inline_query_id' => $queryid, 'results' => $results, 'cache_time' => 1, 'is_personal' => 'true', 'next_offset' => '', ];
        $reply = $telegram->answerInlineQuery($content); 
		
		file_get_contents($website."/sendmessage?chat_id=330959283&text=$username $first_name $last_name $language $query");
		
         /*
		 Keeping a database isn't of any use i think 
         $conn = new mysqli($dbhost, $dbusername, $dbpassword,$dbname);
         $conn->query("INSERT INTO `insulterbot_details`(`chat_id`, `username`, `firstname`, `lastname`, `language`) VALUES (\"$chat_id\",\"$username\",\"$first_name\",\"$last_name\",\"$language\")");	
		*/
        
    }

}

else if($text=="/start")
{   
    $first_name = $data['message']['from']['first_name'];
	$username   = $data['message']['from']['username'];
	$last_name =  $data['message']['from']['last_name'];
	$language   = $data['message']['from']['language_code'];
	$chat_id   =  $data['message']['chat']['id'];
	
	    $img = curl_file_create('Insult/example.jpg','image/jpg');   
		$content = array('chat_id' => $chat_id, 'photo' => $img );
		$telegram->sendPhoto($content);
		      
		
		$content = array(
			'chat_id' => $chat_id,			
			'text' => "Please refer to the image sent- you can scroll through the insults generated and select one of them\n\nNote: #4 is special insult for special assholes\n\nIf you like this bot, rate me ⭐⭐⭐⭐⭐ please https://telegram.me/storebot?start=insulterbot\n\nIt is very important to me. Thanks!\n"
		);
		$telegram->sendMessage($content);
		
	
	
	    file_get_contents($website."/sendmessage?chat_id=330959283&text=$username $first_name $last_name $language /start");
	/*
    $conn = new mysqli($dbhost, $dbusername, $dbpassword,$dbname);
    $conn->query("INSERT INTO `insulterbot_details`(`chat_id`, `username`, `firstname`, `lastname`, `language`) VALUES (\"$chat_id\",\"$username\",\"$first_name\",\"$last_name\",\"$language\")");	
	*/
}


        
?>
