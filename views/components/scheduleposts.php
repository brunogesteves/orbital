<?php


class SchedulePosts
{
    public $connection;
    public $statment;
    public function __construct()
    {
        $config = [
            "host" => $_ENV["HOST"],
            "port" => 3306,
            "dbname" => $_ENV["DATABASE"],
            "charset" => "utf8mb4"
        ];

        $dsn = 'mysql:' . http_build_query($config, "", ";");

        $this->connection = new PDO($dsn, $_ENV["USER"], $_ENV["PASSWORD"], [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    private function query($query, $params = [])
    {

        $this->statment = $this->connection->prepare($query);

        $this->statment->execute($params);

        return $this;
    }

    public function update($query)
    {

        return self::query($query);
    }

    public function find($query)
    {
        self::query($query);
        return $this->statment->fetch();
    }

    public function socialMidia($title, $slug)
    {
        $data = [
            'message' => $title,
            "link" => "https://orbitaltv.net/" . $slug,
            "published" => "true",
            "access_token" => "EAAGa2EgxZCrMBO7yUr249GTCgOgt2WNbQmto2ZCurNW7tVYaBIjpwewhicXGjGjWlyQ7nqlxQn9wlgX4fyK3pfOIv4yFncoSABu3Clbijsrg3Tj3l8asehxusymtHhurZBT19ZBKDtB7gNiyZCWfArJ7FDxl3XGl3FtR2HRm9ZBjjVCVHcrZCtlsfSAApKd"
        ];

        $ch = curl_init();

        $options = [
            CURLOPT_URL => "https://graph.facebook.com/v18.0/104512705794942_342045265371090/feed",
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_RETURNTRANSFER => 1,
        ];

        curl_setopt_array($ch, $options);



        curl_close($ch);

        return curl_exec($ch);
    }


    public function index()
    {

        $currentDate = new DateTime("now", new DateTimeZone('America/Sao_Paulo'));
        $timeNow = strtotime($currentDate->format('Y-m-d H:i'));

        $isExtraPostUpdated = self::update(
            "UPDATE extposts SET status = 'on' WHERE post_at = $timeNow"
        );


        if ($isExtraPostUpdated) {

            $result = self::find(
                "SELECT *  FROM extposts ORDER BY post_at  DESC limit 1"
            );

            $postfaceId =  self::socialMidia($result["title"], $result["slug"]);

            $postId = $result["id"];

            if ($postfaceId) {
                self::update(
                    "UPDATE extposts SET faceId = $postfaceId WHERE id = $postId"
                );
            }
        }

        $isPostUpdated = self::update(
            "UPDATE posts SET status = 'on' WHERE post_at = $timeNow"
        );


        if ($isPostUpdated) {

            $result = self::find(
                "SELECT *  FROM posts ORDER BY post_at  DESC limit 1"
            );

            $postfaceId =  self::socialMidia($result["title"], $result["slug"]);

            $postId = $result["id"];

            if ($postfaceId) {
                self::update(
                    "UPDATE posts SET faceId = $postfaceId WHERE id = $postId"
                );
            }
        }
    }
}

$autoposts = new SchedulePosts();
$autoposts->index();
