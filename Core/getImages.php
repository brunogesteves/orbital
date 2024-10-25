<?php

require_once realpath(__DIR__ . '/../vendor/autoload.php');

// Looing for .env at the root directory
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/../public/");
$dotenv->load();

require "./Database.php";
require "./Images.php";

use Core\Images;


$db = new Images();
$getImages = $db->allImages();

foreach ($getImages as $image) {
    echo '
        
        <div class="cursor-pointer w-[200px] h-[150px] max-[430px]:w-full max-[430px]:h-auto">
            <div class="ui dimmable image">
                <div class="ui dimmer">
                    <div>
                        <div class="ui button seeImage">Ver</div>
                        <button class="ui primary button selectImage">Selecionar</button>
                        <input type="hidden" class="imageName" value= ' . $image["name"] . ' />
                        <input type="hidden" class="imageId" value=' . $image["id"] . ' />

                    </div>
                </div>
                <img src="../images/' . $image["name"] . '" alt=' . $image["name"] . ' class="w-full h-[150px]" />
            </div>
        </div>
        `
';
}
