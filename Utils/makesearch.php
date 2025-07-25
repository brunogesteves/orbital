<?php
include '../Core/functions.php'; // ou require_once

require_once realpath(__DIR__ . '/../vendor/autoload.php');

// Looing for .env at the root directory
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/../public/");
$dotenv->load();

use Core\Database;

$db = new Database();

if (isset($_GET['searchTerm']) && !empty($_GET['searchTerm'])) {
    $searchTerm = $_GET['searchTerm'];
    $searchResults = [$db->find("SELECT p.*, i.name, i.file, u.name as authorName FROM posts p INNER JOIN images i ON i.id = p.image_id INNER JOIN users u ON u.id = p.author_id WHERE p.title Like '%$searchTerm%' ORDER BY p.post_at asc")];

    if ($searchResults[0]) {
        foreach ($searchResults as $item) {
            echo '
                    <div class="w-1/4 max-[767px]:w-full h-auto relative cursor-pointer p-1">
                        <img src="' . insertAdminImage($item["file"]) . '" class=" w-full opacity-50 hover:opacity-80"/>
                        <p class=" title absolute bottom-1 left-0 text-sm pl-3 shadow font-bold text-black">título: "' . $item["title"] . '"
                        </p>
                        <p class=" title absolute bottom-7 left-0 text-sm pl-3 shadow font-bold text-black">autor: "' . $item["authorName"] . '"
                        </p>
                        <a href="/admin/editar?id=' . $item["id"] . '" class="bg-black hover:bg-red-700 px-3 py-1 rounded font-bold text-white m-3 absolute bottom-0 right-0 ">
                            Editar
                        </a>
                    </div>
        ';
        }
    } else {
        echo "<p class='w-full flex justify-center'>Sem Resultados para o termo'" . $_GET["searchTerm"] . "'</p>";
    }
} else {
    echo "<p class='w-full flex justify-center'>Digite o termo desejado</p>";
}
