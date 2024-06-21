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

echo "Data are valid";
