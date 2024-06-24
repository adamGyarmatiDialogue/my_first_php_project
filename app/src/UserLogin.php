<?php

class UserLogin extends Model
{
    /**
     * Create the users login
     * @param array $data - The data to be saved
     */
    public function create(array $data)
    {
        $sql = "INSERT INTO users_logins (user_id, ip_address, device_name)
                VALUES (:userId, :ipAddress, :deviceName)";

        $this->exec($sql, [
            "userId" => $data["userId"],
            "ipAddress" => $data["ipAddress"] ?? "",
            "deviceName" => $data["deviceName"] ?? "web",
        ]);
    }
}
