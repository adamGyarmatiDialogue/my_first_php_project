<?php

require '../../../config/config.php';
require '../../src/includes.php';


$response = new Response("?page=sign-up");
$data = Request::post();

if (!Csrf::check($data["CSRF_TOKEN"])) {
    Session::put("errorMessage", "FORBIDDEN");
    $response->redirect();
}



$rules = [
    "firstName" => ["required", "min:2", "max:255"],
    "lastName" => ["required", "min:2", "max:255"],
    "username" => ["required", "min:2", "max:255", "regexp:/^[a-zA-Z0-9\.\-\_]+$/"],
    "email" => ["required", "email"],
    "password" => ["required", "min:8", "max:100"],
    "reTypedPassword" => ["required", "min:8", "max:100", "sameAs:" . $data["password"]],
];

$isValid = Validator::validate($data, $rules);

if (!$isValid) {
    Session::put("errorMessage", Validator::first());
    $response->redirect();
}

// Validate the unique username and save the data to the database
$user = new User();

// Check the username has taken
$userFound = $user->findFirstByUsername($data['username']);

if ($userFound !== false) {
    Session::put('errorMessage', 'user.username.taken');
    $response->redirect();
}

// Check the email address has taken
$userFound = $user->findFirstByEmail($data['email']);

if ($userFound !== false) {
    Session::put('errorMessage', 'user.email_address.taken');
    $response->redirect();
}

// Create the user
$user->create($data);
Session::put('successMessage', 'user.created');
$response->redirect();
