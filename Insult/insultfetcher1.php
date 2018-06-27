<?php

function getRoast1($name)

{
	

$short_adjective_file		    = file_get_contents('Insult/data1/short_adjective.txt');
$long_adjective_file	        = file_get_contents('Insult/data1/long_adjective.txt');
$noun_file              	    = file_get_contents('Insult/data1/noun.txt');

//generating insult


$short_adjective_rows       = explode("\n", $short_adjective_file);
$long_adjective_rows        = explode("\n", $long_adjective_file);
$noun_rows                  = explode("\n", $noun_file);

$short_adjective		    = $short_adjective_rows[array_rand($short_adjective_rows)];
$long_adjective			    = $long_adjective_rows[array_rand($long_adjective_rows)];
$noun			            = $noun_rows[array_rand($noun_rows)];

if($short_adjective[0]=="a" || $short_adjective[0]=="e" || $short_adjective[0]=="i" || $short_adjective[0]=="o" || $short_adjective[0]=="u")
   $insult="$name is an $short_adjective $long_adjective $noun!";
 
else 
   $insult="$name is a $short_adjective $long_adjective $noun!";
   
   return $insult;
   
   
}