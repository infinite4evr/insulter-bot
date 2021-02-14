<?php

/*
 *
 *Insults are in this format.
 * You are as <adjective> as <article target=adj1>
 * <adjective min=1 max=3 id=adj1> <amount> of
 * <adjective min=1 max=3> <animal> <animal_part>
 */
function getRoast0($name = 'Me')
{
    $name = ucwords($name);

    /*
    There are four text files in data folder containing list of words which are being used for making insulting sentences

    adjective.txt		-> contains all the insult adjectives.
    amount.txt	 	-> contains insulting synonyms of amount.
    animal.txt	 	-> contains animal names.
    animal_part.txt		-> contains animal parts.

    */
    $adjective_file = file_get_contents('Insult/data0/adjective.txt');
    $amount_file = file_get_contents('Insult/data0/amount.txt');
    $animal_file = file_get_contents('Insult/data0/animal.txt');
    $animal_part_file = file_get_contents('Insult/data0/animal_part.txt');

    //exploding list and putting them in arrays
    $adjective_rows = explode("\n", $adjective_file);
    $amount_rows = explode("\n", $amount_file);
    $animal_rows = explode("\n", $animal_file);
    $animal_part_rows = explode("\n", $animal_part_file);

    //Selecting random words from list
    $adjective = $adjective_rows[array_rand($adjective_rows)];
    $amount = $amount_rows[array_rand($amount_rows)];
    $animal = $animal_rows[array_rand($animal_rows)];
    $animal_part = $animal_part_rows[array_rand($animal_part_rows)];

    //Two adjective groups having min=1 and max=3 words
    shuffle($adjective_rows);
    $adjective_group_1 = array_slice($adjective_rows, count($adjective_rows) - mt_rand(1, 3));

    shuffle($adjective_rows);
    $adjective_group_2 = array_slice($adjective_rows, count($adjective_rows) - mt_rand(1, 3));

    // Article a/an for the $adjective_group_1
    $vowel_arr = ['a', 'e', 'i', 'o', 'u'];
    $string = $adjective_group_1[0];
    $len = strtolower(substr($string, 0, 1));

    if (in_array($len, $vowel_arr)) {
        $article = 'an';
    } else {
        $article = 'a';
    }

    switch ($name) {
        case '@insulterbot':
        case 'Insulterbot':
            $body = 'Wtf, What did i do? You better complain to my dad @infinite4evr :"(';
            break;

        case 'Ashu':
        case 'ashu':
        case 'sudhanshu':
            $body = 'Not like you, I respect my dad :)';
            break;
        default:
            $body = $name . ' is as ' . $adjective . ' as ' . $article . ' ' . implode(' ', $adjective_group_1) . ' ' . $amount . ' of ' . implode(' ', $adjective_group_2) . ' ' . $animal . ' ' . $animal_part . '!';
    }

    return $body;
}
