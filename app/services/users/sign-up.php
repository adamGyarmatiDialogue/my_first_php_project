<?php

require '../../../config/config.php';
require '../../src/includes.php';


$response = new Response("?page=sign-up");
$data = Request::post();

if (!Csrf::check($data["CSRF_TOKEN"])) {
    Session::put("errorMessage", "FORBIDDEN");
    $response->redirect();
}
