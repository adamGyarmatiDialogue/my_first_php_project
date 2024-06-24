<?php
$admin = Session::get('admin');
?>
<div class="admin-header">
    <div class="container">
        <div class="website-name">
            My first website
        </div>

        <div class="admin-data">
            <div class="profile-image" style="background-image: url(public/images/profile-image.png)">
                <div class="online-status"></div>
                <div class="clear"></div>
            </div>
            <div class="admin-name">
                <?php
                echo $admin->last_name;
                ?>
            </div>
        </div>

        <div class="clear"></div>
    </div>
</div>