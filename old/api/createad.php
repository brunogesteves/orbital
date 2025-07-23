<?php




include 'index.php';


$statment;



$metodo =  $_SERVER['REQUEST_METHOD'];


switch ($metodo) {
    case 'GET':


    case 'POST':
        // echo json_encode(["status"=>"ok","name" => $_POST["title"]]);
        try {
            $params = [
                "name" => $_POST["title"],
                "position" => $_POST["position"],
                "status" => $_POST["status"],
                "file" => $_POST["file"],
                "link" => $_POST["link"],
                "starts_at" => (int)$_POST["startsAt"],
                "finishs_at" => (int)$_POST["endsAt"]
            ];
            $query = 'INSERT INTO ads(name, position, status, file, link, starts_at, finishs_at)
             VALUES(:name, :position, :status, :file, :link, :starts_at, :finishs_at)';
            $statment = $connection->prepare($query);
            $result =  $statment->execute($params);

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
