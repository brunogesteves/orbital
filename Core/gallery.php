

<?php
require_once realpath(__DIR__ . '/../vendor/autoload.php');

// Looing for .env at the root directory
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/../public/");
$dotenv->load();

require "./Database.php";
require "./Images.php";

use Core\Images;



class Gallery
{


    public function index()
    {
        $db = new Images();
        $images = $db->allImages();

        header("Content-Type: application/json");


        $list = [];

        $myObj = new stdClass();
        $myObj->statusCode = 200;

        foreach ($images as $image) {

            array_push($list, [
                "src" => "http://orbitaltv.net/images/" . $image["name"],

                "name" => $image["name"]
            ]);
        }
        $myObj->result = $list;
        echo json_encode($myObj, JSON_UNESCAPED_SLASHES);
    }
}

$allImges = new Gallery();
$allImges->index();
