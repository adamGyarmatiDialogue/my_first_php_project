<?php

class Testable
{
    protected bool $isTest;
    protected string $errorMessage;

    protected function getErrorMessage(string $errorMessage)
    {
        $this->errorMessage = $errorMessage;
        echo $this->errorMessage . "<br />";
        exit();
    }
}
