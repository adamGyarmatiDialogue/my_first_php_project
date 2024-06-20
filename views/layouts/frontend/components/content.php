<?php
$page = $_GET["page"] ?? "";
?>
<div class="fe-layout_content">
    <div class="container">
        <?php
        if ($page === '') {
            require "views/pages/frontend/homepage.php";
        }

        if ($page === 'sign-up') {
            require "views/pages/frontend/sign-up.php";
        }

        if ($page === 'sign-in') {
            require "views/pages/frontend/sign-in.php";
        }
        ?>
    </div>
</div>