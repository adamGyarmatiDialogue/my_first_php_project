<?php

namespace App\Src;

class File extends Model
{
    /**
     * Insert multiple files into db
     * @param array files
     */
    public function insertMultipleFiles(array $files = [])
    {
        if ($files !== 0) {
            $fileNames = $files["name"];
            $fileTypes = $files["type"];
            $fileSizes = $files["size"];
            $sql = "INSERT INTO files (`file_hash`, `file_name`, `file_type`, `extension`, `file_size`) VALUES ";

            for ($i = 0; $i < sizeof($fileNames); $i++) {
                $sql .= "(";
                $sql .= "\"" . Str::generateRandomString(25) . "\"" . ", ";
                $sql .= "\"" . $fileNames[$i] . "\"" . ", ";
                $sql .= "\"" . $fileTypes[$i] . "\"" . ", ";

                $fileNameParts = (explode(".", $fileNames[$i]));
                $sql .= "\"" . ($fileNameParts[sizeof($fileNameParts) - 1] ?? "n/a") . "\"" . ", ";

                $sql .= "\"" . $fileSizes[$i] . "\"";

                $sql .= "), ";
            }
            $sql = trim($sql);
            $sql = mb_substr($sql, 0, strlen($sql) - 1);

            $this->exec($sql, []);
        }
    }
}
