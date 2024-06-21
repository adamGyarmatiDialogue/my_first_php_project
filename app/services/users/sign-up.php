<?php

require '../../../config/config.php';
require '../../src/includes.php';
require 'sign-up.class.php';

$signUp = new SignUp(Request::post());
$signUp->signUp();
