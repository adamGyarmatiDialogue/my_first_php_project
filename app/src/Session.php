<?php

final class Session
{
    /**
     * Store the value of the session by the given value
     * @param string $key - key of the session
     * @param mixed $value - value to be stored
     */
    public static function put(string $key, mixed $value): void
    {
        $_SESSION[$key] = $value;
    }

    /**
     * Get the value of the session by the given key
     * @param string $key - key of the session
     */
    public static function get(string $key): mixed
    {
        return $_SESSION[$key] ?? null;
    }

    /**
    * Check the session has the given key
    * @param string $key - key of the session
    * @return bool - True if the key exist
    */
    public static function has(string $key): bool
    {
        return isset($_SESSION[$key]);
    }

    /**
    * Delete the key and value from the session
    * @param string $key - key of the session
    */
    public static function delete(string $key)
    {
        if (self::has($key)) {
            unset($_SESSION[$key]);
        }
    }

    /**
    * Show the error message
    */
    public static function showErrorMessage()
    {
        if (self::has('errorMessage')) {
            echo "<div class=\"alert-danger\">" . self::get('errorMessage') . "</div>";
            self::delete('errorMessage');
        }
    }

    /**
    * Show the message if something has succeeded to do
    */
    public static function showSuccessMessage()
    {
        if (self::has('successMessage')) {
            echo "<div class=\"alert-success\">" . self::get('successMessage') . "</div>";
            self::delete('successMessage');
        }
    }
}
