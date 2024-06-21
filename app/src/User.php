<?php

class User extends Model
{
    /**
     * Register
     * @param array $data
     */
    public function register(array $data)
    {
        $isAdmin = ($data["isAdmin"] ?? "") === "on" ? 1 : 0;
        $password = password_hash($data["password"], PASSWORD_BCRYPT);
        $sql = "INSERT INTO `users` (
        `first_name`,
        `last_name`,
        `username`,
        `email`,
        `password`,
        `is_admin`)
        VALUES (
        :firstName,
        :lastName,
        :username,
        :email,
        :password,
        :isAdmin
        )";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            "firstName" => $data["firstName"],
            "lastName" => $data["lastName"],
            "username" => $data["username"],
            "email" => $data["email"],
            "password" => $password,
            "isAdmin" => $isAdmin
        ]);

        echo "Create user";
    }

    public function checkUsernameHasTaken(string $username)
    {
        $stmt = $this->pdo->prepare("SELECT id FROM users WHERE username = :username LIMIT 1");
        $stmt->execute([ "username" => $username]);
        $user = $stmt->fetch();

        return $user;
    }
}
