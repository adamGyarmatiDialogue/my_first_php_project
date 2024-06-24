<?php

require __DIR__ . '../../../../config/config.php';
require __DIR__ . '../../../../app/src/includes.php';

use App\Services\Users\SignIn;
use App\Src\Request;

$signIn = new SignIn(Request::post());
$signIn->signIn();
echo "Sign in";
