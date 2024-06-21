<?php

final class SignUp extends Testable
{
    private array $data;
    private Response $response;
    private User $user;

    /**
     * Sign up
     * @param array $data - The data to sign up
     * @param bool $isTest - Determine that this case is a test or not
     */
    public function __construct(array $data = [], bool $isTest = false)
    {
        $this->data = $data;
        $this->isTest = $isTest;
        $this->response = new Response("?page=sign-up");
        $this->user = new User();
    }

    /**
     * Sign up
     */
    public function signUp()
    {
        $this->checkCsrf();
        $this->validateData();
        $this->checkUsernameHasTaken();
        $this->checkEmailAddressHasTaken();
        $this->creteUser();
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
            "firstName" => ["required", "min:2", "max:255"],
            "lastName" => ["required", "min:2", "max:255"],
            "username" => ["required", "min:2", "max:255", "regexp:/^[a-zA-Z0-9\.\-\_]+$/"],
            "email" => ["required", "email"],
            "password" => ["required", "min:8", "max:100"],
            "reTypedPassword" => ["required", "min:8", "max:100", "sameAs:" . $this->data["password"]],
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
     * Check the username has taken
     */
    private function checkUsernameHasTaken()
    {
        $userFound = $this->user->findFirstByUsername($this->data['username']);

        if ($userFound !== false) {
            if (!$this->isTest) {
                Session::put('errorMessage', 'user.username.taken');
                $this->response->redirect();
            } else {
                $this->getErrorMessage("Username has taken.");
            }
        }
    }

    /**
     * Check the email address has taken
     */
    private function checkEmailAddressHasTaken()
    {
        $userFound = $this->user->findFirstByEmail($this->data['email']);

        if ($userFound !== false) {
            if (!$this->isTest) {
                Session::put('errorMessage', 'user.email_address.taken');
                $this->response->redirect();
            } else {
                $this->getErrorMessage("Email has taken.");
            }
        }
    }

    /**
     * Create the user
     */
    private function creteUser()
    {
        $this->user->create($this->data);
        if (!$this->isTest) {
            Session::put('successMessage', 'user.created');
            $this->response->redirect();
        } else {
            $this->getErrorMessage("User created failed.");
        }
    }
}
