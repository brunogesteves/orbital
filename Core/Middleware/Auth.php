<?php

namespace Core\Middleware;

class Auth
{
    public function handle()
    {

        if (empty($_SESSION["user"])) {
            header('location: /404');
            exit();
        }
    }
}
