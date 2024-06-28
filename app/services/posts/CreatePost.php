<?php

namespace App\Services\Posts;

use App\Src\File;
use App\Src\Post;
use App\Src\Response;
use App\Src\Session;


final class CreatePost
{
    private Response $response;
    private Post $postModel;
    private File $fileModel;

    public function __construct()
    {
        $this->response = new Response("?page=admin-create-post");
        $this->postModel = new Post();
        $this->fileModel = new File();
    }
    /**
     * Create Post
     * @param array $data - The post data
     */
    public function createPost(array $data = [])
    {
        // Check files
        $files = $_FILES["files"];
        if (is_uploaded_file($files['tmp_name'][0])) {
            $this->valdiateFiles($files);
        }

        // Create Post
        $this->postModel->create($data);

        // Create Files
        $this->fileModel->insertMultipleFiles($files);
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

        // Check the error messages
        if (sizeof($errorMessages) !== 0) {
            Session::put("errorMessage", $errorMessages[0]);
            $this->response->redirect();
        }

        // Check the upload dirs
        $uploadDir = "../../../public/uploads";

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777);
        }

        // Upload files
        $tmpNames = $files["tmp_name"];
        for ($i = 0; $i < sizeof($tmpNames); $i++) {
            $tmpName = $tmpNames[$i];
            $fileName = $files["name"][$i];
            $fileNameParts = explode(".", $files["name"][$i]);
            $extension = $fileNameParts[sizeof($fileNameParts) - 1];
            if (!move_uploaded_file($tmpName, $uploadDir . "/" . $fileName . "." . $extension)) {
                array_push($errorMessages, "message.int.err");
            }
        }

        // Check the error messages
        if (sizeof($errorMessages) !== 0) {
            Session::put("errorMessage", $errorMessages[0]);
            $this->response->redirect();
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
