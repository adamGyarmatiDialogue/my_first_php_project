<?php

require '../../../config/config.php';
require '../../src/includes.php';
require 'sign-out.class.php';
require '../../../app/enums/online-status.php';

$signOut = new SignOut();
$signOut->signOut();
