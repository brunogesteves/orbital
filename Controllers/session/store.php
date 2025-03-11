<?php

use Core\Database;

$db = new Database();

$email = $_POST["email"];
$password = $_POST["password"];
$time = time();

$user = $db->findUser("SELECT *,aes_decrypt(password, '$_ENV[SECRET_KEY]') as pass FROM users WHERE email = :email", [
    "email" => $email
]);


if ($user) {
    if ($user["pass"] == $password) {

        login([
            "email" => $email,
            "name" => $user["name"],
            "userID" =>  $user["id"],
            "role" => $user["role"],
            "checkInTime" => $time
        ]);
        $db->loginUser($time, $user["id"]);
        $db->statusUser("active", $email);
        header("location: /admin");
    } else {
        $_SESSION["warningAcess"] = "Email e/ou Senha Erradas";
        header("location: /login");
    }
}

if (!$user) {
    if ($formErrors) {
        header("location: /login");
    } else {
        $_SESSION["warningAcess"] = "Email e/ou Senha Erradas";
        header("location: /login");
    }
}
