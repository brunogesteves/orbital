<?php
foreach ($mobileAds as $ad) : ?>
<div>
    <img src=<?= insertAdminImage("ads/slide.png") ?> class="w-full object-fit object-center" />
    <div class="flex justify-between items-center h-auto w-full my-2 px-3 py-2 gap-x-1 max-[768px]:flex-col">
        <p class="w-auto name">
            <?= $ad["name"] ?>
        </p>
        <p class="w-auto link"><?= $ad["link"] ?></p>
        <div class="flex justify-between items-center ">
            <p class="w-44 starts_at">
                <?= date("d-m-Y H:i", $ad["starts_at"]); ?>
            </p>
            <p class="w-44 finishs_at">
                <?= date("d-m-Y H:i", $ad["finishs_at"]); ?>
            </p>
            <div class="flex gap-x-1">
                <form method="POST" action="/admin/ads/publish" class=" flex items-center">
                    <input type="hidden" name="adId" value="<?= $ad['id'] ?>" />
                    <input type="hidden" name="recentStatus" value="<?= $ad["status"] == "on" ? "off" : "on" ?>" />
                    <button type="submit" name="_method" value="put"
                        class="bg-red-500 hover:bg-red-700 px-3 py-1 rounded-md text-white m-3">
                        <?= $ad["status"] == "on" ? "Despublicar" : "Publicar" ?> </button>
                </form>
                <a href="/admin/editarad?id=<?= $ad["id"] ?>"
                    class="openUpdateAdModalbtn bg-black hover:bg-red-700 px-3 py-1 rounded text-white m-3">
                    Editar
                </a>
                <?php if ($ad["status"] !== "on"): ?>
                <form method="POST" action="/admin/ads/destroy" class=" flex items-center">
                    <button type="submit" name="_method" value="DELETE" class="rounded-md" name="deletePost">
                        <img src=<?= insertAdminImage("icons/trash.png") ?> alt="trash" class="w-7" />
                    </button>
                </form>
                <?php endif; ?>

            </div>
        </div>
    </div>

    <?php endforeach; ?>