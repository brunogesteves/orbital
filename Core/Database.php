<?php

namespace Core;

use PDO;

class Database
{
    public $connection;
    public $statment;

    public function __construct()
    {

        $config = [
            "host" => $_ENV["HOST"],
            "port" => $_ENV["PORT"],
            "dbname" => $_ENV["DATABASE"],
            "charset" => "utf8mb4"
        ];

        $dsn = 'mysql:' . http_build_query($config, "", ";");

        $this->connection = new PDO($dsn, $_ENV["username"], $_ENV["PASSWORD"], [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    private function query($query, $params = [])
    {

        $this->statment = $this->connection->prepare($query);

        $this->statment->execute($params);

        return $this;
    }


    public function findUser($query, $email)
    {
        self::query($query, $email);
        return $this->statment->fetch();
    }
    public function find($query)
    {
        self::query($query);
        return $this->statment->fetch();
    }

    public function findAll($query)
    {
        self::query($query);
        return $this->statment->fetchAll();
    }

    public function delete($query, $params = [])
    {
        return self::query($query, $params);
    }

    public function update($query)
    {
        return self::query($query);
    }

    public function lastId($query)
    {
        self::query("SELECT LAST_INSERT_ID()	");
        return $this->statment->fetchColumn();
    }

    public function insert($query, $params = [])
    {

        return self::query($query, $params);
    }

    public function logs($time, $userId)
    {
        return self::query(
            'INSERT INTO access_logs(login_at, logout_at, user_id) VALUES(:login_at, :logout_at, :user_id)',
            [
                "login_at" => $time,
                "logout_at" => 0,
                "user_id" => $userId
            ]
        );
    }

    // public function logoutUser($time, $checkInTime)
    // {
    //     return self::query(
    //         "UPDATE access_logs SET logout_at = $time WHERE login = $checkInTime"

    //     );
    // }

    public function statusUser($userStatus, $email)
    {
        return self::query(
            "UPDATE users SET status = '$userStatus' WHERE email = '$email'"

        );
    }
}
