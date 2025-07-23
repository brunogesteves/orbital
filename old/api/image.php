<?php
header("Access-Control-Allow-Origin: *");  // Allow all origins, change as needed
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

include 'index.php';


$metodo =  $_SERVER['REQUEST_METHOD'];
// $key1 = $_POST['key1'];
// $key2 = $_POST['key2'];

$data = json_decode(file_get_contents('php://input'), true);

switch ($metodo) {
    case 'GET':




    case 'POST':
        echo json_encode(["status"=>"ok","name" => $_POST["name"]]);


        // code...


    default:
        // code...
        break;
}
