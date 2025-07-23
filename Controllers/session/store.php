<?php

use Core\Database;

$db = new Database();

$email = $_POST["email"];
$password = $_POST["password"];
$time = time();

$user = $db->findUser("SELECT * FROM users WHERE email = :email", [
    "email" => $email
]);


if ($user) {
    if (password_verify($password, $user["password"])) {

        login([
            "email" => $email,
            "name" => $user["name"],
            "userID" =>  $user["id"],
            "role" => $user["role"],
        ]);
        $db->logs($time, $user["id"]);
        $db->statusUser("active", $email);
        $_SESSION["warningAcess"] = "";

        header("location: /admin");
    } else {

        $_SESSION["warningAcess"] = "Email e/ou Senha Erradas";
        // echo "senha errado";
        header("location: /login");
    }
} else {

    $_SESSION["warningAcess"] = "Email e/ou Senha Erradas";
    header("location: /login");
}
