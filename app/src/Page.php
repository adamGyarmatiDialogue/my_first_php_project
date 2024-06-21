<?php

class Page
{
    private $path;

    /**
    * Set the path of the page to be shown
    *
    * @param string $path The path
    */
    public function setPath(string $path): void
    {
        $this->path = $path;
    }

    /**
    * Show the given page
    */
    public function show(): void
    {
        require $this->path;
    }
}
