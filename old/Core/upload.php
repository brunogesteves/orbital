<?php

require_once realpath(__DIR__ . '/../vendor/autoload.php');

// Looing for .env at the root directory
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/../public/");
$dotenv->load();

require "./Database.php";
require "./Images.php";

use Core\Images;


$db = new Images();
$db->uploadImage($_FILES, "upload");
$result = $db->getUniqueImage();

echo '
        <div class="selectNewImage cursor-pointer w-1/4 px-5 h-[150px] max-[430px]:w-full max-[430px]:h-auto">
                <div class="ui dimmable image">
                    <div class="ui dimmer">
                        <div>
                            <div class="ui button seeImage">Ver</div>
                            <button class="ui primary button selectImage">Selecionar</button>
                            <input type="hidden" class="imageName" value=' . $result['name'] . ' />
                            <input type="hidden" class="imageId" value=' . $result['id'] . ' />

                        </div>
                    </div>
                    <img src="../images/' . $result['name'] . '" alt="' . $result['name'] . '" class="w-full h-full selectNewImage" />
                </div>
            </div>
';
