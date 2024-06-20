<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

define('BASE_URL', 'http://localhost/my_first_website');
define('CSRF_TOKEN', 'mTuI6r7qR94twqOX0mJK8dOxkJA5Go');
