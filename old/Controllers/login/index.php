<?php


$formErrors = $_SESSION["formErrors"];
$warningAcess = $_SESSION["warningAcess"];

$_SESSION["formErrors"] = [];
$_SESSION["warningAcess"] = "";

require view("login.php", [
    "formErrors" => $formErrors,
    "warningAcess" => $warningAcess
]);
