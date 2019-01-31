<?php

namespace App\Models;

// The Validate class is used to validate different forms in the project
class Validate extends Model
{

    // Clean up the inputs (remove slashes, html code and whitespace)
    public static function escape($input)
    {
        $input = trim(strip_tags($input));
        $input = stripslashes($input);
        $input = htmlentities($input, ENT_QUOTES);
        return $input;
    }

    // validate if the email is a correct format
    public static function filterEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    // the length of the inputs should have minimum and maximum characters
    public static function length($input, $min, $max)
    {
        if (strlen($input) > $max) {
            return true;
        } else if (strlen($input) < $min) {
            return true;
        }
    }
}

?>