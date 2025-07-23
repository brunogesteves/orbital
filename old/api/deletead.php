

<?php




include 'index.php';


$statment;



$metodo =  $_SERVER['REQUEST_METHOD'];


switch ($metodo) {
    case 'GET':


    case 'POST':
        // echo json_encode(["status"=>"ok","name" => $_POST["title"]]);
        try {
            $id = (int) $_POST["id"];


            $query = "DELETE FROM ads WHERE id=$id";

            $statment = $connection->prepare($query);
            $result =  $statment->execute();

            echo json_encode($result,  JSON_UNESCAPED_SLASHES);
        }

        //catch exception
        catch (Exception $e) {
            // echo 'Message: ' . "Desculpe Tente Novamente";
            echo 'Message: ' . $e->getMessage();

            // echo json_encode($e);
        }


        // code...


    default:
        // code...
        break;
}
