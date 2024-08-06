<?php
include(__DIR__ . "/../../views/partials/admin/header.php");
?>
<main >
    <div class="ui padded centered grid">
    
        <div class="two column mobile only row ">
            <?php
            include(__DIR__ . "/../../Components/admin/index/mobile.php");
            ?>
        </div>
        <div class="three column tablet only row">
            <?php
            include(__DIR__ . "/../../Components/admin/index/mobile.php");
            ?>
        </div>
        <div class="computer only row -m-4">
            <?php
            include(__DIR__ . "/../../Components/admin/index/computer.php");
            ?>

        </div>

        
    </div>
</main>



<?php
include(__DIR__ . "/../../views/partials/admin/footer.php");

?>