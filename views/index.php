<?php
include("partials/header.php");
?>
<main class="">
    <div class="ui centered grid">
        <div class="two column mobile only row">
            <?php
            include(__DIR__ . "/../Components/home/mobile.php");
            ?>
        </div>
        <div class="three column tablet only row">
            <?php
            include(__DIR__ . "/../Components/mobile.php");
            ?>
        </div>
        <div class="computer only row w-full">
            <?php
            include(__DIR__ . "/../Components/home/computer.php");
            ?>
        </div>
    </div>
</main>

<?php
require("partials/footer.php");
?>