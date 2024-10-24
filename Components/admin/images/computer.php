<div class="h-[calc(100vh_-_161px)] w-full flex justify-start">
    <div class="w-2/12">
        <?php
        include "views/partials/admin/sidebar.php";
        ?>
    </div>
    <main class="w-10/12 ">
        <div class="flex flex-col w-full">
            <div class="w-full flex justify-center items-start gap-x-5">
                <form method="POST" action="imagens/create" enctype="multipart/form-data" class="flex flex-col">
                    <input type="file" name="image" class="fileImageUpload" required accept=".jpg, .jpeg, .png" />
                    <button type="submit" class="text-white bg-black my-7 p-2 rounded-lg text-xl">adicionar</button>
                </form>
                <div class="previewInputImage"> </div>
            </div>
            <div class="flex justify-start items-start h-[calc(100vh_-_273px)]  flex-wrap overflow-y-auto">
                <?php
                foreach ($images as $image) : ?>
                    <div class=" cursor-pointer w-1/4 p-1 h-60 relative">
                        <div class="ui dimmable image w-full h-full">
                            <div class="ui dimmer">
                                <div class="content">
                                    <form method="post" action="imagens/destroy" class="w-full h-full">
                                        <input type="hidden" name="imageId" value=<?= $image["id"] ?> />
                                        <input type="hidden" name="imageName" value=<?= $image["name"] ?> />
                                        <div class="ui button seePicture" id=<?= $image["name"] ?>>Ver</div>
                                        <button type="submit" name="_method" value="DELETE" class="ui primary button ">Apagar</button>
                                    </form>
                                </div>
                            </div>
                            <div class="w-full h-full">
                                <img src=<?= "../images/" . $image["name"] ?> alt=<?= $image["name"] ?> class="w-full object-scale-down max-h-full m-auto" />
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="ui modal modalImage">
                <div id="modalImage"></div>
            </div>

    </main>
</div>
<script src="../scripts/images.js" defer></script>

</div>