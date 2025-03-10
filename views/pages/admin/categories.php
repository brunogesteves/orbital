<?php
include insertComponent("admin/header.php");
?>

<!-- <div id="size"></div> -->
<div class="mx-auto mt-2 flex">
    <?php
    include insertComponent("admin/sidebar.php");
    ?>
    <main class="w-full max-[768px]:w-full  flex flex-col justify-start items-center h-[calc(100vh_-_261px)] ">

        <form method="POST" action="categories/create" class="flex items-center cursor-pointer mb-5 ">
            <input type="text" name="newCategory" id="" placeholder="nova categoria"
                class="rounded-lg border-black bg-gray-300 mr-5 pl-3 py-1">
            <button type="submit" class="rounded-md bg-slate-400 px-4 py-1">
                Adicionar
            </button>
        </form>
        <?php foreach ($AllCategories as $cat): ?>
            <div class="w-1/4 max-[767px]:w-full h-auto  p-1 flex justify-center gap-x-10 uppercase">
                <p class=" text-black text-xl pl-3">
                    <?= $cat["name"] ?> </p>
                <form method="POST" action="categories/destroy" class="flex items-center cursor-pointer">
                    <button type="submit" class="rounded-md" name="_method" value="DELETE">
                        <img src=<?= insertAdminImage("icons/trash.png") ?> alt="trash" class="w-7" />
                        <input type="hidden" name="catIdDelete" value="<?= $cat["id"] ?>">
                    </button>
                </form>
            </div>
        <?php endforeach; ?>


    </main>
</div>



<?php
include insertComponent("admin/footer.php");
?>
<!-- <script src=<?= insertAdminScript("images.js") ?>></script> -->