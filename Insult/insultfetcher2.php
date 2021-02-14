<?php

function getRoast2($you)
{
    $expletive_file = file_get_contents('Insult/data2/expletive.txt');
    $intro_file = file_get_contents('Insult/data2/intro.txt');
    $adjective_file = file_get_contents('Insult/data2/adjective.txt');
    $compound_adjective_file = file_get_contents('Insult/data2/compound_adjective.txt');
    $noun_file = file_get_contents('Insult/data2/noun.txt');

    $adjective_rows = explode("\n", $adjective_file);
    $intro_rows = explode("\n", $intro_file);
    $expletive_rows = explode("\n", $expletive_file);
    $noun_rows = explode("\n", $noun_file);
    $compound_adjective_rows = explode("\n", $compound_adjective_file);

    //Selecting random words from list
    $compound_adjective = $compound_adjective_rows[array_rand($compound_adjective_rows)];
    $adjective = $adjective_rows[array_rand($adjective_rows)];
    $intro = $intro_rows[array_rand($intro_rows)];
    $expletive = $expletive_rows[array_rand($expletive_rows)];
    $noun = $noun_rows[array_rand($noun_rows)];

    $insults = [
        "you're being this much of a ${adjective} ${noun}",
        "you're being such a ${adjective} ${expletive} ${noun}",
        "you're being a ${adjective} ${noun}",
        "fucking ${compound_adjective} ${adjective} ${noun} ass bitch",
        "${you} look like a ${adjective} ${noun} and a ${noun} at the same ${expletive} time you ${expletive} ${noun}",
        "${expletive} ${adjective} ${adjective} ${noun}",
        "${expletive} ${adjective} ${adjective} ${adjective} ass ${noun}",
        "you're a ${adjective} ${expletive} ${noun}",
        "what a ${expletive} ${adjective} ${noun} you are",
        "fucking ${noun}",
        "${expletive} ${adjective} ${noun}"];

    $insult = $insults[array_rand($insults)];

    return $insult . '!';
}
