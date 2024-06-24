<?php

class UserLogin extends Model
{
    /**
     * Create the users login
     * @param array $data - The data to be saved
     */
    public function create(array $data): void
    {
        $sql = "INSERT INTO users_logins (user_id, ip_address, device_name)
                VALUES (:userId, :ipAddress, :deviceName)";

        $this->exec($sql, [
            "userId" => $data["userId"],
            "ipAddress" => $data["ipAddress"] ?? "",
            "deviceName" => $data["deviceName"] ?? "web",
        ]);
    }

    /**
     * Delete the admins login
     * @param int $adminId
     */
    public function delete(int $adminId): void
    {
        $sql = "DELETE FROM users_logins WHERE user_id = :adminId ORDER BY id DESC LIMIT 1";

        $this->exec($sql, [
            "adminId" => $adminId,
        ]);
    }
}
