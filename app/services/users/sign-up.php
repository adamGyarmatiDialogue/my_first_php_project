<?php

require '../../../config/config.php';

$firstName = $_POST["firstName"] ?? "";
$lastName = $_POST["lastName"] ?? "";
$username = $_POST["username"] ?? "";
$email = $_POST["email"] ?? "";
$password = $_POST["password"] ?? "";
$reTypedPassword  = $_POST["reTypedPassword "] ?? "";
$isAdmin  = $_POST["isAdmin "] ?? "";

// Validate data
if (strlen(trim($firstName)) === 0) {
    $_SESSION["errorMessage"] = "Please give valid first name";
    header("Location: " . BASE_URL . "?page=sign-up");
    exit();
}
