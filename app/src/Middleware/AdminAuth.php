<?php

namespace App\Src\Middleware;

use App\Enums\RecordStatus;
use App\Services\Admin\SignOut;
use App\Src\User;
use App\Src\Response;
use App\Src\Session;

class AdminAuth
{
    private Response $response;
    private User $userModel;
    private SignOut $signOut;

    public function __construct()
    {
        $this->response = new Response("/");
        $this->userModel = new User();
        $this->signOut = new SignOut();
    }

    /**
     * Handle the admins requests
     */
    public function auth()
    {
        if (!Session::has("admin")) {
            $this->response->redirect();
        }

        $adminId = Session::get("admin")->id;
        $admin = $this->userModel->findFirstById($adminId);

        if ($admin === false) {
            $this->signOut->signOut();
        }

        if ($admin->is_admin !== RecordStatus::ACTIVE->value) {
            $this->signOut->signOut();
        }

        if ($admin->status !== RecordStatus::ACTIVE->value) {
            $this->signOut->signOut();
        }
    }
}
