<?php

$fileName = $_FILES["newLogotypeImage"]["name"];
$tempName = $_FILES["newLogotypeImage"]["tmp_name"];
$target = "public/images/orbital/logo.png";
$url = $_POST["url"];

if (move_uploaded_file($tempName, $target)) {
    header('Location: ' . $url);
    exit();
}
