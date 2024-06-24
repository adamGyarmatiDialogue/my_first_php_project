<?php

namespace App\Src;

final class Request
{
    private static $data;

    /**
     * Get input data via POST request
     * @return array The data
     */
    public static function post(): array
    {
        self::checkCsrfToken();
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
    private static function checkCsrfToken()
    {
        $token = $_POST["CSRF_TOKEN"];

        if ($token !== Csrf::get("CSRF_TOKEN")) {
            $_SESSION["errorMessage"] = "Frobidden request.";
            header("Location: " . BASE_URL . "?page=sign-up");
            exit();
        }
    }
}
