<?php

if (session_status() === PHP_SESSION_NONE) {
	session_start();
}

define('BASE_URL', 'http://localhost/my_first_website');

define("DB_NAME", "php_native_db");
define("DB_HOST", "127.0.0.1");
define("DB_PORT", "3306");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "test1234");
define("DB_DSN", "mysql:dbname=" . DB_NAME . ";host=" . DB_HOST . ":" . DB_PORT);
