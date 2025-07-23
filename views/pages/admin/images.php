<?php
include insertComponent("admin/header.php");

?>

<!-- <div id="size"></div> -->
<div class="mx-auto mt-2 flex">
    <?php
    include insertComponent("admin/sidebar.php");
    ?>
    <main class="w-full max-[768px]:w-full h-full flex max-[768px]:flex-col justify-center items-start">
        <div class="w-full flex justify-center items-center gap-x-5 max-[768px]:flex-col">
            <form id="newImageForm" method="POST" action="images/create" enctype="multipart/form-data"
                class="flex flex-col">
                <input type="file" name="fileImageUpload" id="fileImageUpload" accept=".jpg, .jpeg, .png" />

                <div class="previewInputImage"> </div>
                <button type="submit" class="w-full text-white bg-black my-7 p-2 rounded-lg text-xl">adicionar</button>
            </form>
        </div>
        <div class=" w-full min-[768px]:h-[calc(100vh_-_261px)] overflow-y-auto">
            <div class="flex  justify-start items-start min-[768px]:h-[calc(100vh_-_391px)] flex-wrap overflow-y-auto">
                <?php
                foreach ($allImages as $image) : ?>
                    <div class="cursor-pointer w-1/4 max-[768px]:w-full p-1 h-auto relative">
                        <img src=<?= insertAdminImage($image["file"]) ?> alt=<?= $image["name"] ?>
                            class="w-full object-scale-down max-h-full m-auto " />
                        <form method="post" action="images/destroy" class="w-full h-full bg-green-500 ">
                            <input type="hidden" name="imageId" value=<?= $image["id"] ?> />
                            <input type="hidden" name="imageName" value=<?= $image["name"] ?> />
                            <div class="openDialogSeeImage" class="" data-value="<?= $image["file"] ?>">
                                <img src=<?= insertAdminImage("icons/see.jpg")  ?> alt="see"
                                    class="w-10 absolute top-2 left-2" />
                            </div>
                            <button type="submit" name="_method" value="DELETE" class="absolute top-2 right-2">
                                <img src=<?= insertAdminImage("icons/trash.png")  ?> alt="<?= $image["name"] ?>"
                                    class="w-7" />
                            </button>

                        </form>
                    </div>
                <?php endforeach; ?>
            </div>
            <!-- <div class="ui modal modalImage">
                <div id="modalImage"></div>
            </div> -->
        </div>
    </main>
</div>

<dialog id="dialogSeeImage" class="w-fit h-fit bg-transparent fixed top-5">
    <div id="watchTheImage"> </div>
    <button id="closeDialogSeeImage" class="text-white ">
        <img src=<?= insertAdminImage("icons/close.png") ?> alt="logo"
            class="size-4 max-[768px]:size-5 object-scale-down flex-none absolute top-4 right-4" />
    </button>
</dialog>

<?php
include insertComponent("admin/footer.php");
?>
<script src=<?= insertAdminScript("images.js") ?>></script>