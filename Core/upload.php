<?php

require_once realpath(__DIR__ . '/../vendor/autoload.php');

// Looing for .env at the root directory
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/../public/");
$dotenv->load();

use Core\Images;

$db = new Images();

$db->uploadImage("post", $_FILES);
$result = $db->getUniqueImage();

echo '      
    <div data-image="' . $result['name'] . '" data-id="' . $result['id'] . '"
     class="selectImage cursor-pointer w-1/4 max-[768px]:w-full p-1 h-auto relative group">
         <img src="../public/images/' . $result['name'] . '" alt="' . $result['name'] . '" class="w-full
object-scale-down max-h-full m-auto group-hover:opacity-50" />
                <span class="absolute top-1/2 left-1/4 text-white text-6xl hidden group-hover:block">adicionar</span>

</div>
';
