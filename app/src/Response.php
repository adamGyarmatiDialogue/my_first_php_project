<?php

class Response
{
    private string $location;

    public function __construct(string $location)
    {
        $this->location = $location;
    }
    /**
     * Redirect the user to the given url
     * @param
     */
    public function redirect(): void
    {
        header("Location: " . BASE_URL . $this->location);
        exit();
    }
}
