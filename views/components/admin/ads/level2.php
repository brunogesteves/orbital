<?php
foreach ($mobileAds as $ad) : ?>
<div>
    <img src=<?= insertAdminImage("ads/slide.png") ?> class="w-full object-fit object-center" />
    <div class="flex justify-between items-center h-auto w-full my-2 px-3 py-2 gap-x-1 max-[768px]:flex-col">
        <p class="w-auto name">
            <?= $ad["name"] ?>
            nome
        </p>
        <p class="w-auto link">link</p>
        <div class="flex justify-between items-center ">
            <p class="w-24 starts_at">
                inicia
            </p>
            <p class="w-24 finishs_at">
                termina
            </p>
        </div>
        <p class="w-20">
            publicado
        </p>

        <div class="flex gap-x-1">
            <form method="POST" action="/admin/ads/publish" class=" flex items-center">
                <button type="submit" name="_method" value="put"
                    class="bg-red-500 hover:bg-red-700 px-3 py-1 rounded-md text-white m-3">
                    Publicar
                </button>
            </form>
            <a href="/admin/editarad?id=<?= $ad["id"] ?>"
                class="openUpdateAdModalbtn bg-black hover:bg-red-700 px-3 py-1 rounded text-white m-3">
                Editar
            </a>
            <form method="POST" action="/admin/ads/destroy" class=" flex items-center">

                <button type="submit" name="_method" value="DELETE" class="rounded-md" name="deletePost">
                    <img src=<?= insertAdminImage("icons/trash.png") ?> alt="trash" class="w-7" />
                </button>
            </form>
        </div>
    </div>
</div>

<?php endforeach; ?>