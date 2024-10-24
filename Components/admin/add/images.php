<div class="flex justify-start flex-wrap gap-y-5 max-[430px]:h-full bg-white">
    <?php
    foreach ($images as $image) : ?>
        <div class="cursor-pointer w-1/4 px-5 h-[150px] max-[430px]:w-full max-[430px]:h-auto">
            <div class="ui dimmable image">
                <div class="ui dimmer">
                    <div>
                        <div class="ui button seeImage">Ver</div>
                        <button class="ui primary button selectImage">Selecionar</button>
                        <input type="hidden" class="imageName" value=<?= $image["name"] ?> />
                        <input type="hidden" class="imageId" value=<?= $image["id"] ?> />

                    </div>
                </div>
                <img src="../images/<?= $image["name"] ?>" alt=<?= $image["name"] ?> class="size-60" />
            </div>
        </div>
    <?php endforeach; ?>
    <div class="newAddedImage"></div>
</div>