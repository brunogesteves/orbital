<?php

$con = mysqli_connect($_ENV["HOST"], $_ENV["USER"], $_ENV["PASSWORD"], $_ENV["DATABASE"]);

if ($con->connect_error) {
    exit('Could not connect');
}


$sql = "SELECT * FROM images";

$query = mysqli_query($con, $sql);

if (mysqli_num_rows($query) > 0) {
    while ($result = mysqli_fetch_array($query)) {

        echo '
        <div class="cursor-pointer w-[200px] h-[150px] max-[430px]:w-full max-[430px]:h-auto">
            <div class="ui dimmable image">
                <div class="ui dimmer">
                    <div>
                        <div class="ui button seeImage">Ver</div>
                        <button class="ui primary button selectImage">Selecionar</button>
                        <input type="hidden" class="imageName" value= ' . $result["name"] . ' />
                        <input type="hidden" class="imageId" value=' . $result["id"] . ' />

                    </div>
                </div>
                <img src="../images/' . $result["name"] . '" alt=' . $result["name"] . ' class="w-full h-[150px]" />
            </div>
        </div>`
';


        // mysqli_close($con);
    }
}
