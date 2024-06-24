<?php

namespace App\Src;

use App\Src\Middleware\AdminAuth;

final class Bootstrap
{
    /**
     * Start the application
     */
    public static function start()
    {
        $admin = Session::get("admin") ?? null;
        $user = Session::get("user") ?? null;

        // Session::delete("admin");
        // Session::delete("user");

        $layout = new Layout("views/layouts/frontend/layout.php");

        if ($user) {
            $layout->setLayout("views/layouts/backend/layout.php");
        }

        if ($admin) {
            $adminAuth = new AdminAuth();
            $adminAuth->auth();
            $layout->setLayout("views/layouts/admin/layout.php");
        }

        $layout->show();
    }
}
