<?php

require '../../../config/config.php';
require '../../src/includes.php';
require 'sign-in.class.php';

$signIn = new SignIn(Request::post());
$signIn->signIn();
echo "Sign in";
