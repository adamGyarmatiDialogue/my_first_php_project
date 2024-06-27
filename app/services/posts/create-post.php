<?php

require __DIR__ . '/../../../config/config.php';
require __DIR__ . '/../../../vendor/autoload.php';

use App\Services\Posts\CreatePost;
use App\Src\Request;

$createPost = new CreatePost();
$createPost->createPost(Request::post());
