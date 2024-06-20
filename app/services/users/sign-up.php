<?php

require '../../../config/config.php';
require '../../src/includes.php';

$data = Request::post();
$response = new Response("?page=sign-up");
$response->redirect();
