<?php

namespace App\Services\Admin;

use App\Enums\OnlineStatus;
use App\Src\User;
use App\Src\Session;
use App\Src\UserLog;
use App\Src\Response;
use App\Src\UserLogin;

class SignOut
{
    private Response $response;
    private mixed $admin;
    private User $userModel;
    private UserLogin $userLoginModel;
    private UserLog $userLogModel;

    public function __construct()
    {
        $this->response = new Response("/");
        $this->admin = Session::get("admin");
        $this->userModel = new User();
        $this->userLoginModel = new UserLogin();
        $this->userLogModel = new UserLog();
    }

    /**
     * Sign out
     */
    public function signOut(): void
    {
        $this->setAdminStatusToOffline();
        $this->deleteAdminLogin();
        $this->createAdminLog();
        $this->deletetAdminSession();
        $this->response->redirect();
    }

    /**
     * Set the admin status offline
     */
    private function setAdminStatusToOffline(): void
    {
        $this->userModel->updateOnlineStatus($this->admin->id, OnlineStatus::OFFLINE->value);
    }

    /**
     * Delete admin login
     */
    private function deleteAdminLogin(): void
    {
        $this->userLoginModel->delete($this->admin->id);
    }

    /**
     * Create admin log
     */
    private function createAdminLog(): void
    {
        $this->userLogModel->create([
            "userId" => $this->admin->id,
            "objectName" => "admin",
            "eventName" => "logged_out",
        ]);
    }

    /**
     * Delete admin session
     */
    private function deletetAdminSession(): void
    {
        Session::delete("admin");
    }
}
