<?php

namespace App\Services\Posts;

use App\Src\Response;

use function PHPUnit\Framework\stringContains;

final class CreatePost
{
    private Response $response;

    public function __construct()
    {
        $response = new Response("/");
    }
    /**
     * Create Post
     * @param array $data - The post data
     */
    public function createPost(array $data = [])
    {
        $this->valdiateFiles($_FILES["files"]);
    }

    /**
     * Validate Files from form
     * @param array $files
     */
    private function valdiateFiles(array $files = [])
    {
        $errorMessages = [];

        // Check the files extensions
        if (!$this->checkValidExtension($files["name"])) {
            array_push($errorMessages, "validation.file.extension");
        }

        // Check the files size
        if (!$this->checkSize($files["size"])) {
            array_push($errorMessages, "validation.file.size");
        }
    }

    /**
     * Get the extension of the file
     * @param array $fileSizes
     * @return bool the sizes are valid
     */
    private function checkSize(array $fileSizes): bool
    {
        foreach ($fileSizes as $size) {
            $megabyte = $size / (1024 * 1024);
            if ($megabyte > 10) {
                return false;
            }
        }
        return true;
    }

    /**
     * Get the extension of the file
     * @param array $fileNames
     * @return bool the extensions are valid
     */
    private function checkValidExtension(array $fileNames): bool
    {
        $allowedExtensions = ["jpg", "jpeg", "png", "gif"];
        foreach ($fileNames as $fileName) {
            $fileNameParts = explode(".", $fileName);
            $fileExtension = strtolower($fileNameParts[sizeof($fileNameParts) - 1]);
            if (!in_array($fileExtension, $allowedExtensions)) {
                return false;
            }
        }

        return true;
    }

    public function addNumbers(int $a, int $b): int
    {
        return ($a + $b);
    }
}
