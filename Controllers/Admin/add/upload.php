<?php

$con = mysqli_connect($_ENV["HOST"], $_ENV["USER"], $_ENV["PASSWORD"], $_ENV["DATABASE"]);


if ($con->connect_error) {
    exit('Could not connect');
}

$fileName = str_replace(" ", "_", $_FILES["file"]["name"]);
$tempName = $_FILES["file"]["tmp_name"];


$target = "../../../images/" . $fileName;


move_uploaded_file($tempName, $target);
$sql = "INSERT INTO images(name) VALUES('$fileName')";


$query = mysqli_query($con, $sql);

$sql2 = "SELECT * from images ORDER BY id DESC LIMIT 1";

$query2 = mysqli_query($con, $sql2);

if (mysqli_num_rows($query2) > 0) {
    while ($result = mysqli_fetch_assoc($query2)) {

        echo '
        <div class="selectNewImage cursor-pointer w-1/4 px-5 h-[150px] max-[430px]:w-full max-[430px]:h-auto">
                <div class="ui dimmable image">
                    <div class="ui dimmer">
                        <div>
                            <div class="ui button seeImage">Ver</div>
                            <button class="ui primary button selectImage">Selecionar</button>
                            <input type="hidden" class="imageName" value=' . $result['name'] . ' />
                            <input type="hidden" class="imageId" value=' . $result['name'] . ' />

                        </div>
                    </div>
                    <img src="../images/' . $result['name'] . '" alt="' . $result['name'] . '" class="w-full h-full selectNewImage" />
                </div>
            </div>
';


        mysqli_close($con);
    }
}
return true;
