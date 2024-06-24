<?php
$page = $_GET['page'] ?? '';
?>
<div class="admin-content">
    <?php
    $pageObj = new Page();

    if ($page === '') {
        $pageObj->setPath('views/pages/admin/homepage.php');
    }

    // Posts
    if ($page === 'admin-posts') {
        $pageObj->setPath('views/pages/admin/posts/index.php');
    }

    // Create post
    if ($page === "admin-create-post") {
        $pageObj->setPath('views/pages/admin/posts/create.php');
    }

    $pageObj->show();
    ?>
</div>