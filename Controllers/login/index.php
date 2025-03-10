<?php



$_SESSION["formErrors"] = [
    "email" => "",
    "password" => "",

];
$_SESSION["warningAcess"] = "";
$formErrors = $_SESSION["formErrors"];
$warningAcess = $_SESSION["warningAcess"];

require view("login.php");
