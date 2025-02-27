<?php
include insertComponent("header.php");
?>
<main class="min-[768px]:max-w-screen-2xl mx-auto">
    <section
        class="mx-auto w-full flex justify-between items-start max-[767px]:flex-col max-sm:mt-2 max-sm:gap-y-2 max-[425px]:h-auto min-[426px]:h-auto min-[768px]:h-[560px] mt-2">
        <?php
        include insertComponent("home/level1.php");
        include insertComponent("home/level2.php");
        ?>
    </section>

    <section class="mx-auto flex justify-center w-full h-auto max-[767px]:flex-col mt-3 ">
        <?php
        include insertComponent("home/level3.php");
        include insertComponent("home/level4.php");
        ?>
    </section>
</main>
<?php
include insertComponent("footer.php");
?>