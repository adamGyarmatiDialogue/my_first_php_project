<?php

require __DIR__ . '/../../../config/config.php';
require __DIR__ . '/../../../vendor/autoload.php';

use App\Services\Admin\SignOut;

$signOut = new SignOut();
$signOut->signOut();
