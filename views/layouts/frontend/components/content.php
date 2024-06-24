<?php

use App\Src\Page;

$page = $_GET["page"] ?? "";
?>
<div class="fe-layout_content">
    <div class="container">
        <?php
        $pageObj = new Page();
        $pageObj->setPath('views/pages/frontend/homepage.php');

        if ($page === 'sign-up') {
            $pageObj->setPath('views/pages/frontend/sign-up.php');
        }

        if ($page === 'sign-in') {
            $pageObj->setPath('views/pages/frontend/sign-in.php');
        }

        $pageObj->show();
        ?>
    </div>
</div>