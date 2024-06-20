<?php

$admin = null;
$user = null;

if (!$admin && !$user) {
    require "views/layouts/frontend/layout.php";
    exit();
}

if ($user) {
    require "views/layouts/backend/layout.php";
    exit();
}

if ($admin) {
    require "views/layouts/admin/layout.php";
    exit();
}
