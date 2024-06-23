<?php

class SignIn extends Testable
{
    private array $data;
    private Response $response;
    private User $user;

    /**
     * Sign ip
     * @param array $data - The data to sign up
     * @param bool $isTest - Determine that this case is a test or not
     */
    public function __construct(array $data = [], bool $isTest = false)
    {
        $this->data = $data;
        $this->isTest = $isTest;
        $this->response = new Response("?page=sign-in");
        $this->user = new User();
    }

    public function signIn()
    {
        $this->checkCsrf();
        $this->validateData();
        $this->checkUser();
    }

    /**
     * Check the CSRF token
     */
    private function checkCsrf()
    {
        if (!$this->isTest) {
            if (!Csrf::check($this->data["CSRF_TOKEN"])) {
                Session::put("errorMessage", "FORBIDDEN");
                $this->response->redirect();
            }
        }
    }

    /**
     * Validate data
     */
    private function validateData()
    {
        if (sizeof($this->data) === 0) {
            $this->getErrorMessage("Give valid data.");
        }
        $isValid = Validator::validate($this->data, [
            "email" => ["required"],
            "password" => ["required", "min:8", "max:100"],
        ]);

        if (!$isValid) {
            if (!$this->isTest) {
                Session::put("errorMessage", Validator::first());
                $this->response->redirect();
            } else {
                $this->getErrorMessage("Validation failed.");
            }
        }
    }

    /**
     * Check the user by the given email or username
     */
    private function checkUser()
    {
        $user = $this->user->findFirstByEmail($this->data["email"]);

        if (!$user) {
            $user = $this->user->findFirstByUsername($this->data["email"]);

            if (!$user) {
                Session::put("errorMessage", "Wrong login data.");
                $this->response->redirect();
            }
        }

        if (!password_verify($this->data["password"], $user->password)) {
            Session::put("errorMessage", "Wrong login data.password");
            $this->response->redirect();
        }
    }
}
