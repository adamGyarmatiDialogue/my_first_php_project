<?php

namespace App\Src;

final class Str
{
    /**
     * Generate the random string by given lenght
     * @param int $length The legnth of the randomly generate string
     * @return string The randomly generated string
     */
    public static function generateRandomString(int $length = 25): string
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
