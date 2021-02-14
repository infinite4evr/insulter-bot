<?php

function getRoast4()
{
    $subject_file = file_get_contents('Insult/data3/subject.txt');
    $like_a_file = file_get_contents('Insult/data3/like_a.txt');
    $adjective_file = file_get_contents('Insult/data3/adjectives.txt');
    $noun_file = file_get_contents('Insult/data3/nouns.txt');

    $adjective_rows = explode("\n", $adjective_file);
    $like_a_rows = explode("\n", $like_a_file);
    $noun_rows = explode("\n", $noun_file);
    $subject_rows = explode("\n", $subject_file);

    //Selecting random words from list
    $subject = $subject_rows[array_rand($subject_rows)];
    $adjective_1 = $adjective_rows[array_rand($adjective_rows)];
    $like_a = $like_a_rows[array_rand($like_a_rows)];
    $noun_1 = $noun_rows[array_rand($noun_rows)];

    if ($subject === 'Your') {
        $adjective_2 = $adjective_rows[array_rand($adjective_rows)];
        $noun_2 = $noun_rows[array_rand($noun_rows)];
        $insult = "${subject} ${adjective_1} ${noun_1}" . "s ${like_a} like ${adjective_2} ${noun_2}" . 's!';
    }

    if ($subject === 'You') {
        $insult = "${subject} ${like_a} like a ${adjective_1} ${noun_1}!";
    }

    return $insult;
}
