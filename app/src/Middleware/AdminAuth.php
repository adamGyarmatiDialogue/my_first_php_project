<?php

class AdminAuth
{
    private Response $response;
    private User $userModel;

    public function __construct()
    {
        $this->response = new Response("/");
        $this->userModel = new User();
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
            $this->response->redirect();
        }

        if ($admin->is_admin !== 1) {
            $this->response->redirect();
        }

        if ($admin->status !== 1) {
            $this->response->redirect();
        }
    }
}
