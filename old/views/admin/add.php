<?php
include(__DIR__ . "/../../views/partials/admin/headerAdmin.php");
?>
<main>
    <div class="ui padded centered grid">
        <div class="two column mobile only row ">
            <?php
            include(__DIR__ . "/../../Components/admin/add/mobile.php");
            ?>
        </div>
        <div class="three column tablet only row">
            <?php
            include(__DIR__ . "/../../Components/admin/add/mobile.php");
            ?>

        </div>

        <div class="computer only row -m-4">
            <?php
            include(__DIR__ . "/../../Components/admin/add/computer.php");
            ?>

        </div>
    </div>
</main>



<?php
include(__DIR__ . "/../../views/partials/admin/footer.php");

?>

<script src="../scripts/suneditor.min.js" defer></script>
<script src="../scripts/addpost.js" defer></script>
<script src="../scripts/pt.js" defer></script>

<link href="../styles/suneditor.min.css" rel="stylesheet" />