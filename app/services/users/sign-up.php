<?php

require __DIR__ . '../../../../config/config.php';
require __DIR__ . '../../../../app/src/includes.php';

use App\Src\Request;
use App\Services\Users\SignUp;

$signUp = new SignUp(Request::post());
$signUp->signUp();
