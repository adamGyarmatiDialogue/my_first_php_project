<?php

namespace App\Src;

class User extends Model
{
    /**
     * Register
     * @param array $data
     */
    public function create(array $data)
    {
        $isAdmin = ($data['isAdmin'] ?? '') === 'on' ? 1 : 0;
        $password = password_hash($data['password'], PASSWORD_BCRYPT);

        $sql = "INSERT INTO `users`
      (`first_name`, `last_name`, `username`, `email`, `password`, `is_admin`) VALUES
      (:firstName, :lastName, :username, :email, :password, :isAdmin) ";
        $this->exec($sql, [
            'firstName' => trim($data['firstName']),
            'lastName' => trim($data['lastName']),
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => $password,
            'isAdmin' => $isAdmin,
        ]);
    }

    /**
     * Update the users online status
     * @param int $userId
     * @param int $onlineStatus
     */
    public function updateOnlineStatus($userId, $onlineStatus)
    {
        $sql = "UPDATE users SET online_status = :onlineStatus where id = :userId LIMIT 1";
        $this->exec($sql, [
            'onlineStatus' => $onlineStatus,
            'userId' => $userId,
        ]);
    }

    /**
     * Find all users
     */
    public function findAll(): mixed
    {
        return $this->find("SELECT * FROM users");
    }

    /**
     * Find the first user by the given id
     * @param int $userId
     * @return mixed The user or false
     */
    public function findFirstById(int $userId): mixed
    {
        return $this->first("SELECT * FROM users WHERE id = :userId", ["userId" => $userId]);
    }

    /**
     * Check the username has taken
     *
     * @param string $username The username to be checked
     * @return mixed The user or false
     */
    public function findFirstByUsername(string $username): mixed
    {
        return $this->first("SELECT * FROM users WHERE username = :username", ["username" => $username]);
    }

    /**
     * Check the email address has taken
     *
     * @param string $email The email address to be checked
     * @return mixed The user or false
     */
    public function findFirstByEmail(string $email): mixed
    {
        return $this->first("SELECT * FROM users WHERE email = :email", ["email" => $email]);
    }
}
