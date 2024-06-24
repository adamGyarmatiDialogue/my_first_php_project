<?php

class UserLog extends Model
{
    /**
     * Create the users log
     * @param array $data - The data to be saved
     */
    public function create(array $data)
    {
        $sql = "INSERT INTO users_logs (user_id, object_name, object_id, event_name)
                VALUES (:userId, :objectName, :objectId, :eventName)";

        $this->exec($sql, [
            "userId" => $data["userId"],
            "objectName" => $data["objectName"],
            "objectId" => $data["objectId"] ?? 0,
            "eventName" => $data["eventName"],
        ]);
    }
}
