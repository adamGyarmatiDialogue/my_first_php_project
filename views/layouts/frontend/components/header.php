<?php
$page = $_GET["page"] ?? "";
?>
<div class="fe-layout_header">
    <div class="container">
        <div class="app-name">
            My website
        </div>

        <nav>
            <ul>
                <a href="<?php echo BASE_URL; ?>" class="<?= ($page === '') ? 'active' : '' ?>">
                    <li>Kezdőlap</li>
                </a>

                <a href="?page=sign-up" class="<?= ($page === 'sign-up') ? 'active' : '' ?>">
                    <li>Regisztráció</li>
                </a>

                <a href="?page=sign-in" class="<?= ($page === 'sign-in') ? 'active' : '' ?>">
                    <li>Belépés</li>
                </a>
            </ul>
        </nav>

        <div class="clear"></div>
    </div>
</div>