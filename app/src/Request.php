<?php

final class Request
{
    private static $data;

    /**
     * Get input data via POST request
     * @return array The data
     */
    public static function post(): array
    {
        self::checkCSRFToken();
        return self::$data = $_POST;
    }

    /**
     * Get input data via GET request
     * @return array The data
     */
    public static function get(): array
    {
        return self::$data = $_GET;
    }

    /**
     * Check the CSRF token sent by the client
     */
    private static function checkCSRFToken()
    {
        $token = $_POST["CSRF_TOKEN"];
        if ($token !== CSRF_TOKEN) {
            $_SESSION["errorMessage"] = "Frobidden request.";
            header("Location: " . BASE_URL . "?page=sign-up");
            exit();
        }
    }
}
