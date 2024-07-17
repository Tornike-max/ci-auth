<?php

namespace App\Libraries;


class Hash
{
    public static function encrypt($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    public static function check($password, $hashedPassword)
    {
        if (password_verify($password, $hashedPassword)) {
            return true;
        }

        return false;
    }
}
