<?php


use Core\Database;

$db = new Database();
$currentDate = new DateTime("now", new DateTimeZone('America/Sao_Paulo'));

// var_dump($_POST);

if ($_POST["changeLogotype"]) {
    $logotype = $_POST["changeLogotype"];
    $sourceImage = 'images/' . $_POST["changeLogotype"];
    copy($sourceImage, "images/orbital/logo.png");
    header('Location: ' . "/admin");
    
}



if ($_POST["UpdateStatusId"]) {    
var_dump($_POST["UpdateStatusId"]);
var_dump($_POST["UpdateStatus"]);
    $status = $_POST["UpdateStatus"];  
    $id = (int) $_POST["UpdateStatusId"];


    $result = $db->update("UPDATE posts SET status='$status' WHERE id=$id");
    header('Location: ' . "/admin");
}

if ($_POST["statusChangeExtPostStatus"]) {    
    $status = $_POST["statusChangeExtPostStatus"];  
    $id = (int) $_POST["statusChangeExtPostStatusId"];

    $result = $db->update("UPDATE extposts SET status='$status' WHERE id=$id");
    header('Location: ' . "/admin");
}



if ($_POST["sectionUpdateExtPost"]) {
    var_dump("section");
    $section = $_POST["sectionUpdateExtPost"];
    $id = (int) $_POST["sectionUpdateExtPostId"]; 

    $result = $db->update("UPDATE extposts SET section='$section' WHERE id=$id");
    header('Location: ' . "/admin");
}





if ($_POST["updateHourExtPost"]) {        
    $updateTime = strtotime($_POST["updateHourExtPost"]);
    $id = (int) $_POST["updateHourExtPostId"];    
    $result = $db->update("UPDATE extposts SET post_at=$updateTime  WHERE id=$id");
    header('Location: ' . "/admin");
}