    <div class="flex flex-col w-full min-h-[calc(100vh_-_312px)]">
        <form method="POST" action="imagens/create" enctype="multipart/form-data" class="flex  items-center w-full  flex-col">
            <input type="file" name="image" class="fileImageUpload" required accept=".jpg, .jpeg, .png" />
            <button type="submit" class="text-white bg-black my-7 p-2 rounded-lg text-xl">adicionar</button>
        </form>
        <div class="previewInputImage"> </div>
        <div class="flex justify-start items-start gap-y-7 flex-wrap overflow-y-auto my-3 ">
            <?php
            foreach ($images as $image) : ?>
                <div class=" cursor-pointer w-full relative">
                    <div class="ui dimmable image">
                        <div class="ui dimmer">
                            <div class="content">
                                <form method="post" action="imagens/destroy">
                                    <input type="hidden" name="imageId" value=<?= $image["id"] ?> />
                                    <input type="hidden" name="imageName" value=<?= $image["name"] ?> />
                                    <div class="ui button seePicture" id=<?= $image["name"] ?>>Ver</div>
                                    <button type="submit" name="_method" value="DELETE" class="ui primary button ">Apagar</button>
                                </form>
                            </div>
                        </div>
                        <img src=<?= "../images/" . $image["name"] ?> alt=<?= $image["name"] ?> class="w-full object-cover min-h-40" />
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <script src="../scripts/images.js" defer></script>