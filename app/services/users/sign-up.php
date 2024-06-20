<?php

require '../../../config/config.php';

$csrfToken = $_POST["CSRF_TOKEN"] ??  "";
$firstName = $_POST["firstName"] ?? "";
$lastName = $_POST["lastName"] ?? "";
$username = $_POST["username"] ?? "";
$email = $_POST["email"] ?? "";
$password = $_POST["password"] ?? "";
$reTypedPassword  = $_POST["reTypedPassword "] ?? "";
$isAdmin  = $_POST["isAdmin "] ?? "";

// Validate data
if ($csrfToken !== CSRF_TOKEN) {
    $_SESSION["errorMessage"] = "Frobidden request.";
    header("Location: " . BASE_URL . "?page=sign-up");
    exit();
}

if (strlen(trim($firstName)) === 0) {
    $_SESSION["errorMessage"] = "Please give valid first name";
    header("Location: " . BASE_URL . "?page=sign-up");
    exit();
}
