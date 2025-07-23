<?php

namespace Core;


use Core\Database;

class Users
{
    public function allUsers()
    {
        $db = new Database();
        return $db->findAll("select name from users ORDER BY name ASC");
    }
}
