<?php

require '../../../config/config.php';
require '../../src/includes.php';
require '../../../app/src/enums/record-status.php';
require 'sign-in.class.php';

// echo "Test log in <br />";

/**
 * Test - Wrong password
 */
// $signIn = new SignIn([
//     "email" => "gyarmati",
//     "password" => "password1234",
// ], true);
// $signIn->signIn();

/**
 * Test - Wrong username
 */
// $signIn = new SignIn([
//     "email" => "gyarmatia",
//     "password" => "password",
// ], true);
// $signIn->signIn();

/**
 * Test - Wrong email
 */
// $signIn = new SignIn([
//     "email" => "adam1@gmail.com",
//     "password" => "password",
// ], true);
// $signIn->signIn();

/**
 * Test - Login as admin without permission
 */
// $signIn = new SignIn([
//     "email" => "teszt.elek",
//     "password" => "password",
//     "isAdmin" => "on",
// ], true);
// $signIn->signIn();

/**
 * Test - Login failed status 0
 */
// $signIn = new SignIn([
//     "email" => "teszt.elek",
//     "password" => "password",
// ], true);
// $signIn->signIn();

/**
 * Test - Successfull login
 */
// $signIn = new SignIn([
//     "email" => "gyarmati",
//     "password" => "password",
// ], true);
// $signIn->signIn();

/**
 * Test - Successfull login as admin
 */
// $signIn = new SignIn([
//     "email" => "gyarmati",
//     "password" => "password",
//     "isAdmin" => "on",
// ], true);
// $signIn->signIn();
