<?php

function getRoast3()
{
    $specials = file_get_contents('Insult/special_insult/special.txt');
    $special = explode("\n", $specials);

    return $special[array_rand($special)];
}
