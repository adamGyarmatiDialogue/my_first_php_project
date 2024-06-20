<?php

final class App
{
    /**
     * Start the application
     */
    public static function start()
    {
        $admin = null;
        $user = null;
        $layout = new Layout("views/layouts/frontend/layout.php");

        if ($user) {
            $layout->setLayout("views/layouts/backend/layout.php");
        }

        if ($admin) {
            $layout->setLayout("views/layouts/admin/layout.php");
        }

        $layout->show();
    }
}
