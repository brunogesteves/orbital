<?php

session_start();

// $_SESSION["user"] = [];
function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    extract($attributes);
    return base_path('views/pages/' . $path);
}

function insertComponent($path, $attributes = [])
{
    extract($attributes);

    return base_path('views/components/' . $path);
}

function insertAdminComponent($path, $attributes = [])
{
    extract($attributes);

    return base_path('../views/components/' . $path);
}


function insertImage($image)
{
    return 'public/images/' . $image;
}

function insertAdminImage($image)
{
    return '../public/images/' . $image;
}


function insertScript($script)
{
    return 'config/scripts/' . $script;
}
function insertAdminScript($script)
{
    return '../config/scripts/' . $script;
}

function insertAdminStyle($style)
{
    return '../config/styles/' . $style;
}



function login($user)
{

    $_SESSION["user"] = [
        "email" => $user["email"],
        "name" => ucwords($user["name"]),
        "userID" =>  $user["userID"],
        "role" => $user["role"],
        "checkInTime" => $user["checkInTime"]

    ];

    // session_regenerate_id(true);
}

function logout() {}
