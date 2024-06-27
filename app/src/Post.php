<?php

namespace App\Src;

final class Post extends Model
{
    /**
     * Create Post
     * @param array $data - The data of the Post
     */
    public function create(array $data)
    {
        $sql = "INSERT INTO posts (`title`, `lead`, `content`, `published_at`)
                VALUES (:postTitle, :postLead, :postContent, :postPublishedAt)";

        $this->exec($sql, [
            "postTitle" => trim($data["postTitle"]),
            "postLead" => trim($data["postLead"]),
            "postContent" => trim($data["postContent"]),
            "postPublishedAt" => $data["postPublishedAt"],
        ]);
    }
}
