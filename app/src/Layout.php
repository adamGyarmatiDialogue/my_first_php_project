<?php

namespace App\Src;

final class Layout
{
    private string $layout;

    public function __construct(string $layout)
    {
        $this->layout = $layout;
    }

    /**
     * Show the previously set layout
     */
    public function show(): void
    {
        require $this->layout;
    }

    /**
     * Overwrite the given value of the current layout
     * @param string $layout
     */
    public function setLayout(string $layout): void
    {
        $this->layout = $layout;
    }
}
