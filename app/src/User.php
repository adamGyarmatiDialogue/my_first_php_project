<?php

abstract class User
{
    abstract protected function login();

    /**
     * Create new user
     */
    public function register()
    {
        echo "register";
    }
}
