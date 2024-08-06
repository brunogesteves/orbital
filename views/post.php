<?php
include("partials/headerPost.php");
?>
<main>
    <div class="ui padded centered grid">
    <div class="two column mobile only row ">
            <?php
            include(__DIR__ . "/../Components/post/mobile.php");
            ?>
        </div>
        <div class="three column tablet only row">
            <?php
            include(__DIR__ . "/../Components/mobile.php");
            ?>

        </div>

        <div class="computer only -m-4">
            <?php
            include(__DIR__ . "/../Components/post/computer.php");
            ?>
        </div>
    </div>
</main>


<?php
require("partials/footer.php");
?>