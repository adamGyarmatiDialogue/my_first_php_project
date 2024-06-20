<?php

final class Csrf
{
    /**
     * Give the input field to forms
     */
    public static function input()
    {
        $csrf = self::get();
        return  "<input type=\"hidden\" name=\"CSRF_TOKEN\" value=\"" . $csrf . "\" />";
    }

    /**
     * Check the given csrf token
     * @param string $csrfToken - The csrf token to be checked
     * @return bool
     */
    public static function check(string $csrfToken): bool
    {
        if (!$csrfToken) {
            return false;
        }

        if ($csrfToken !== self::get()) {
            return false;
        }

        return true;
    }

    /**
     * Get the Csrf token
     * @return string Give back the Csrf token
     */
    public static function get(): string
    {
        if(!Session::get("CSRF_TOKEN")) {
            $csrf = self::generate();
            Session::put("CSRF_TOKEN", $csrf);
        }

        return Session::get("CSRF_TOKEN");
    }

    /**
     * Generate Csrf token
     * @return Csrf token
     */
    public static function generate(): string
    {
        return Str::generateRandomString(25) . "_" . Str::generateRandomString(25);
    }
}
