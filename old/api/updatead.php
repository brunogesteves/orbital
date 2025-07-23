<?php




include 'index.php';


$statment;

$metodo =  $_SERVER['REQUEST_METHOD'];


switch ($metodo) {
    case 'GET':




    case 'POST':
        try {
        $id = (int)$_POST["id"];
            
               $name = $_POST["title"];
                $position = $_POST["position"];
                $status = $_POST["status"];
                $file = $_POST["file"];
                $link = $_POST["link"];
                $starts_at = (int)$_POST["startsAt"];
                $endsAt = (int)$_POST["endsAt"];
            
            
            $query = "UPDATE ads SET name='$name', 
            position='$position',
            status='$status',
            file='$file',
            link='$link',
            starts_at=$starts_at,
            finishs_at=$endsAt
            WHERE id=$id";

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
