<?php

require '../../../config/config.php';
require '../../src/includes.php';
require 'sign-up.class.php';

// Test empty data
// $signUp = new SignUp([], true);
// $signUp->signUp();

// Test username has taken failed
// $signUp = new SignUp([
//     "firstName" => "Teszt",
//     "lastName" => Str::generateRandomString(25),
//     "firstName" => Str::generateRandomString(25),
//     "username" => "teszt.elek",
//     "email" => "teszt" . Str::generateRandomString(25) . "@isocial.network",
//     "password" => "password",
//     "reTypedPassword" => "password",
// ], true);
// $signUp->signUp();

// Test email has taken failed
// $signUp = new SignUp([
//     "firstName" => "Teszt",
//     "lastName" => Str::generateRandomString(25),
//     "firstName" => Str::generateRandomString(25),
//     "username" => Str::generateRandomString(25),
//     "email" => "teszt@gmail.com",
//     "password" => "password",
//     "reTypedPassword" => "password",
// ], true);
// $signUp->signUp();

// User created successfully
// $signUp = new SignUp([
//     "firstName" => "Teszt",
//     "lastName" => Str::generateRandomString(25),
//     "firstName" => Str::generateRandomString(25),
//     "username" => Str::generateRandomString(25),
//     "email" => "teszt" . Str::generateRandomString(25) . "@gmail.com",
//     "password" => "password",
//     "reTypedPassword" => "password",
// ], true);
// $signUp->signUp();
