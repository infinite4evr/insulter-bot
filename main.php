<?php
require ('config.php');
/*
$data = file_get_contents("dummy.json");
$data = json_decode($data,true);
$data = $data['result'][0];
*/

if (array_key_exists('inline_query',$data))
{ 
	$query = $data['inline_query']['query'];
    if ($query != null && $query != '' )
    {
		$queryid = $data['inline_query']['id'];

		require ("Insult/insultfetcher0.php");
		require ("Insult/insultfetcher1.php");
		require ("Insult/insultfetcher2.php");
		require ("Insult/insultfetcher3.php");
		require ("Insult/insultfetcher4.php");
		
        $insult0 = getRoast0($query); 
		$insult1 = getRoast1($query);
		$insult2 = getRoast2($query);
		$insult3 = getRoast3();
		$insult4 = getRoast4();	
		

        $results = json_encode([['type' => 'article', 'id' => '1', 'title' => "$insult0" , 'message_text' => $insult0],['type' => 'article', 'id' => '2', 'title' => "$insult3" , 'message_text' => $insult3],['type' => 'article', 'id' => '3', 'title' => "$insult2" , 'message_text' => $insult2],['type' => 'article', 'id' => '4', 'title' => "$insult4" , 'message_text' => $insult4],['type' => 'article', 'id' => '5', 'title' => "$insult1" , 'message_text' => $insult1]]);				
        $content = ['inline_query_id' => $queryid, 'results' => $results, 'cache_time' => 1, 'is_personal' => 'true', 'next_offset' => '', ];
		$reply   = $telegram->answerInlineQuery($content);
		return;
         /*
		 Keeping a database isn't of any use i think 
         $conn = new mysqli($dbhost, $dbusername, $dbpassword,$dbname);
         $conn->query("INSERT INTO `insulterbot_details`(`chat_id`, `username`, `firstname`, `lastname`, `language`) VALUES (\"$chat_id\",\"$username\",\"$first_name\",\"$last_name\",\"$language\")");	
		*/        
    }
}

else if(stristr($data['message']['text'],'/insult')!=false)
{   
	$group_data = get_group_info($data);
	$query      = $data['message']['text'];
	$query      = explode(" ",$query);	
	$query      = $query[1];

	if($query!=null)
	{	
		require ("Insult/insultfetcher0.php");
		$insult =getRoast0($query); 
		$content['chat_id'] = $group_data['chat_id'];
		$content['text']    = $insult;
		if(array_key_exists('message_id_replied',$group_data))
		$content['reply_to_message_id'] = $group_data['message_id_replied'];
		$telegram->sendMessage($content);

		$group_data = implode(",",$group_data);
		return;
	}
	else 
	{
		$content = array(
			'chat_id' => $group_data['chat_id'],			
			'text' => "Dumbass, Knew it you were an asshole, you need to send me the name of person to insult, Ex : /Insult Jams",		
			'reply_to_message_id' =>  $group_data['message_id']
		);
		$telegram->sendMessage($content);
		return ;
	}
}

else if($data['message']['text']=="/start")
{   
    $first_name = $data['message']['from']['first_name'];
	$username   = $data['message']['from']['username'];
	$last_name =  $data['message']['from']['last_name'];
	$language   = $data['message']['from']['language_code'];
	$chat_id   =  $data['message']['chat']['id'];		      
		
		$content = array(
			'chat_id' => $chat_id,			
			'text' => "Hi there, I am an inline bot whose work is to assist you with insulting other people who get on your nerves\n\nTo use me type: @insulterbot \"Name\"\n\nEx: @insulterbot Jams\n\nI'll send you some randomly generated insults through which you can scroll and click on the best insult to send\n\nUpdate: Now you can add me to groups too and type /Insult \"Name\" and I will roast the person on group :)\n\nNote: #2 is special insult for special assholes\n\nIf you like this bot, rate me ⭐⭐⭐⭐⭐ please https://telegram.me/storebot?start=insulterbot\n\nIt is very important to me. Thanks!",
			"disable_web_page_preview" => "true"
		);
		$telegram->sendMessage($content);	
		return;
	/*
    $conn = new mysqli($dbhost, $dbusername, $dbpassword,$dbname);
    $conn->query("INSERT INTO `insulterbot_details`(`chat_id`, `username`, `firstname`, `lastname`, `language`) VALUES (\"$chat_id\",\"$username\",\"$first_name\",\"$last_name\",\"$language\")");	
	*/
}

function get_group_info($data)
{  
	if(array_key_exists('reply_to_message',$data['message']))
	$group_data['message_id_replied'] = $data['message']['reply_to_message']['message_id'];

    $group_data["chat_id"]    = $data['message']['chat']['id'];
    $group_data["message_id"] = $data['message']['message_id'];
    $group_data["username"]   = $data['message']['chat']['username'];
    return $group_data;
    
}        
?>
