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

    public function uploadImage($source, $files = [],)
    {
        $db = $this->connection;

        $fileName = str_replace(" ", "_", $files["fileImageUpload"]["name"]);
        $tempName = $files["fileImageUpload"]["tmp_name"];
        $target = $source == "post" ? "../public/images/" . $fileName : "public/images/" . $fileName;

        if (file_exists($target)) {
            $separateFilename = explode('.', $target);
            $ext = $separateFilename[1];
            $target = $separateFilename[0] . "(1)." . $ext;
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
