<?php

use Core\Database;


$db = new Database();

date_default_timezone_set('America/Sao_Paulo');

$minTime = (new DateTime(date('m/d/Y h:i:s a', time())))->format('Y-m-d\TH:i');

$newAdErrors = [];
$tempNewAdContent=[];

$name = $_POST["adName"];
$position = $_POST["adPosition"];
$status = "off";
$file = $_POST["adName"];
$link = $_POST["adLink"];
$starts_at = strtotime($_POST["adStarts_at"]);
$finishs_at = strtotime($_POST["adFinishs_at"]);

if (strlen($name) == 0) {
    $newAdErrors["adName"] = "Digite o Nome";
}else{
    $tempNewAdContent["adName"] = $_POST["adName"];
}
if ($position == "none") {
    $newAdErrors["adPosition"] = "Selecione uma posição";
}else{
    $tempNewAdContent["adPosition"] = $_POST["adPosition"];
}
if (strlen($link) == 0) {
    $newAdErrors["adLink"] = "Digite o Link";
}else{
    $tempNewAdContent["adLink"] = $_POST["adLink"];    
}
if ($starts_at == false) {
    $newAdErrors["adStarts_at"] = "Selecione Data Inicial";
}else{
    $tempNewAdContent["adStarts_at"] = $_POST["adStarts_at"];
}

if ($finishs_at == false) {
    $newAdErrors["adFinishs_at"] = "Selecione Data Final";
}else{
    $tempNewAdContent["adFinishs_at"] = $_POST["adFinishs_at"];
}

if ($finishs_at < $starts_at) {
    $newAdErrors["adFinalDate"] = "Data Final é maior que data Inicial";
}

if (empty($newAdErrors)) {
    $fileName = $_FILES["adFile"]["name"];
    $tempName = $_FILES["adFile"]["tmp_name"];
    $fileSize = $_FILES["adFile"]['size'];
    $fileError = $_FILES["adFile"]['error'];


    $separateFilename = explode('.', $fileName);
    $ext = $separateFilename[1];
    $target = "images/ads/" . $file . "." . $ext;

    $file = $file . "." . $ext;
    $result = $db->insert('INSERT INTO ads(name, position, status, file, link, starts_at, finishs_at)
            VALUES(:name, :position, :status, :file, :link, :starts_at, :finishs_at)', [
        "name" => $name,
        "position" => $position,
        "status" => $status,
        "file" => $file,
        "link" => $link,
        "starts_at" => $starts_at,
        "finishs_at" => $finishs_at
    ]);
    if ($result) {
        if (move_uploaded_file($tempName, $target)) {
            $newAdErrors = [];
            $tempNewAdContent=[];
            $_SESSION["newAdErrors"]=[];
            $_SESSION["tempNewAdContent"]=[];
            header('Location: ' . "/admin/ads");

        }
    }
} else {    
    $_SESSION["newAdErrors"]=$newAdErrors;
    $_SESSION["tempNewAdContent"]=$tempNewAdContent;
    header('Location: ' . "/admin/ads");
}