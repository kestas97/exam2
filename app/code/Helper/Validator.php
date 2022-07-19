<?php

namespace Helper;

class Validator
{
    public static function checkEmail($email)
    {
        return strpos($email, '@') !== false;
    }
}
