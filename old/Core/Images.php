<?php

namespace Core;


use Core\Database;

class Images
{
    public $connection;

    public function __construct()
    {
        $this->connection = new Database();
    }


    public function getImages()
    {
        $db = $this->connection;
        return $db->findAll("select * from images");
    }

    public function uploadImage($files = [], $action)
    {
        $db = $this->connection;

        $fileName = str_replace(" ", "_", $files["image"]["name"]);
        $tempName = $files["image"]["tmp_name"];
        $fileSize = $files["image"]['size'];
        $fileError = $files["image"]['error'];


        $target = $action == "upload" ? "../images/" . $fileName : "images/" . $fileName;


        if ($fileError === 0 && $fileSize > 0) {
            if (file_exists($target)) {
                $separateFilename = explode('.', $target);
                $ext = $separateFilename[1];
                $target = $separateFilename[0] . "(1)." . $ext;
            }
        }
        if (move_uploaded_file($tempName, $target)) {
            $db->insert('INSERT INTO images(name) VALUES(:fileName)', [
                "fileName" => $fileName
            ]);
        }
    }


    public function getUniqueImage()
    {
        $db = $this->connection;
        return $db->find("SELECT * from images ORDER BY id DESC LIMIT 1");
    }
}
