<div class="h-[calc(100vh_-_161px)] w-full flex justify-start">
    <div class="w-2/12">
        <?php
        include "views/partials/admin/sidebar.php";
        ?>
    </div>
    <section class="w-10/12 ">
        <div class="ui tabular menu">
            <div class="active item" data-tab="front">Frente</div>
            <div class="item" data-tab="mobile">Mobile</div>
            <div class="item" data-tab="slide">Slide</div>
        </div>
        <div class="ui active tab" data-tab="front">
            <button class="openNewModalbtn text-white bg-black my-7 p-2 ml-4 rounded-lg text-xl">Adicionar
                Anúncio</button>

            <div class="flex flex-col ads overflow-y-auto h-[calc(100vh_-_300px)]">
                <?php
                foreach ($frontAds as $ad) : ?>
                    <div>
                        <img src="../images/ads/<?= $ad['file'] ?>" class=" w-full object-fit object-center" />
                        <div class="flex justify-between items-center h-auto w-full my-2 px-3 py-2 gap-x-1 ">
                            <p class="w-auto name">
                                <?= $ad["name"] ?>
                            </p>
                            <p class="file hidden"><?= $ad["file"] ?></p>
                            <p class="position hidden"><?= $ad["position"] ?></p>
                            <p class="postId hidden"><?= $ad["id"] ?></p>
                            <p class="w-auto link"><?= $ad["link"] ?></p>
                            <p class="w-24 starts_at">
                                <?= date("d/m/Y h:i:s A", $ad["starts_at"]); ?>
                            </p>
                            <p class="w-24 finishs_at">
                                <?= date("d/m/Y h:i:s A", $ad["finishs_at"]); ?>
                            </p>
                            <p class="w-20">
                                <?= $ad["status"] == "on" ? "Publicado" : "Fora do Ar" ?>
                            </p>

                            <div class="flex gap-x-1">
                                <form method="POST" action="/admin/ads/publish" class=" flex items-center">
                                    <input type="hidden" name="statusId" value=<?= $ad["id"] ?> />
                                    <input type="hidden" name="recentStatus" value=<?= $ad["status"] == "on" ? "off" : "on" ?> />
                                    <button type="submit" name="_method" value="put" class="bg-red-500 hover:bg-red-700 px-3 py-1 rounded-md text-white m-3">
                                        <?= $ad["status"] == "on" ? "Despublicar" : "Publicar" ?>
                                    </button>
                                </form>
                                <button class="openUpdateAdModalbtn bg-black hover:bg-red-700 px-3 py-1 rounded text-white m-3">
                                    Verificar
                                </button>
                                <form method="POST" action="/admin/ads/destroy" class=" flex items-center">
                                    <input type="hidden" name="deleteAdId" value=<?= $ad["id"] ?> />
                                    <input type="hidden" name="deleteAdname" value=<?= $ad["name"] ?> />
                                    <button type="submit" name="_method" value="DELETE" class="rounded-md" name="deletePost">
                                        <img src="../images/icons/trash.png" alt="trash" class="w-7" />
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>
        </div>
        <div class="ui tab" data-tab="mobile">
            <button class="openNewModalbtn text-white bg-black my-7 p-2 ml-4 rounded-lg text-xl">Adicionar
                Anúncio</button>
            <div class="flex flex-col h-[calc(100vh_-_300px)] ads overflow-y-auto">
                <?php
                foreach ($mobileAds as $ad) : ?>
                    <img src="../images/ads/<?= $ad['file'] ?>" class=" w-full object-fit object-center" />
                    <div class="flex justify-between items-center h-auto w-full my-2 px-3 py-2 gap-x-1 ">
                        <p class="w-auto name">
                            <?= $ad["name"] ?>
                        </p>
                        <p class="file hidden"><?= $ad["file"] ?></p>
                        <p class="position hidden"><?= $ad["position"] ?></p>
                        <p class="postId hidden"><?= $ad["id"] ?></p>
                        <p class="w-auto"><?= $ad["link"] ?></p>
                        <p class="w-24 starts_at">
                            <?= date("d/m/Y h:i:s A", $ad["starts_at"]); ?>
                        </p>
                        <p class="w-24 finishs_at">
                            <?= date("d/m/Y h:i:s A", $ad["finishs_at"]); ?>
                        </p>
                        <p class="w-20 ">
                            <?= $ad["status"] == "on" ? "Publicado" : "Fora do Ar" ?>
                        </p>
                        <div class="flex gap-x-1">
                            <form method="POST" action="/admin/ads/publish" class=" flex items-center">
                                <input type="hidden" name="statusId" value=<?= $ad["id"] ?> />
                                <input type="hidden" name="recentStatus" value=<?= $ad["status"] == "on" ? "off" : "on" ?> />
                                <button type="submit" name="_method" value="put" name="statusPost" class="bg-red-500 hover:bg-red-700 px-3 py-1 rounded-md text-white m-3">
                                    <?= $ad["status"] == "on" ? "Despublicar" : "Publicar" ?>
                                </button>
                            </form>
                            <button class="openUpdateAdModalbtn bg-black hover:bg-red-700 px-3 py-1 rounded text-white m-3">
                                Verificar
                            </button>
                            <form method="POST" action="/admin/ads/destroy" class=" flex items-center">
                                <input type="hidden" name="deleteAdId" value=<?= $ad["id"] ?> />
                                <input type="hidden" name="deleteAdname" value=<?= $ad["name"] ?> />
                                <button type="submit" name="_method" value="DELETE" class="rounded-md" name="deletePost">
                                    <img src="../images/icons/trash.png" alt="trash" class="w-7" />
                                </button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="ui tab" data-tab="slide">
            <button class="openNewModalbtn text-white bg-black my-7 p-2 ml-4 rounded-lg text-xl">Adicionar
                Anúncio</button>

            <div class="flex flex-col h-[calc(100vh_-_300px)] ads overflow-y-auto">
                <?php
                foreach ($slideAds as $ad) : ?>
                    <img src="../images/ads/<?= $ad['file'] ?>" class=" w-full object-fit object-center" />
                    <input type="hidden" name="recentStatus" value=<?= $ad["status"] == "on" ? "off" : "on" ?> />
                    <div class="flex justify-between items-center h-auto w-full my-2 px-3 py-2 gap-x-1 ">
                        <p class="w-auto name"><?= $ad["name"] ?></p>
                        <p class="file hidden"><?= $ad["file"] ?></p>
                        <p class="position hidden"><?= $ad["position"] ?></p>
                        <p class="postId hidden"><?= $ad["id"] ?></p>
                        <p class="w-auto"><?= $ad["link"] ?></p>
                        <p class="w-24 starts_at">
                            <?= date("d/m/Y h:i:s A", $ad["starts_at"]); ?>
                        </p>
                        <p class="w-24 finishs_at">
                            <?= date("d/m/Y h:i:s A", $ad["finishs_at"]); ?>
                        </p>
                        <p class="w-20 ">
                            <?= $ad["status"] == "on" ? "Publicado" : "Fora do Ar" ?>
                        </p>
                        <div class="flex gap-x-1">
                            <form method="POST" action="/admin/ads/publish" class=" flex items-center">
                                <input type="hidden" name="statusId" value=<?= $ad["id"] ?> />
                                <input type="hidden" name="recentStatus" value=<?= $ad["status"] == "on" ? "off" : "on" ?> />
                                <button type="submit" name="_method" value="put" name="statusPost" class="bg-red-500 hover:bg-red-700 px-3 py-1 rounded-md text-white m-3">
                                    <?= $ad["status"] == "on" ? "Despublicar" : "Publicar" ?>
                                </button>
                            </form>
                            <button class="openUpdateAdModalbtn bg-black hover:bg-red-700 px-3 py-1 rounded text-white m-3">
                                Verificar
                            </button>
                            <form method="POST" action="/admin/ads/destroy" class=" flex items-center">
                                <input type="hidden" name="deleteAdId" value=<?= $ad["id"] ?> />
                                <input type="hidden" name="deleteAdname" value=<?= $ad["name"] ?> />
                                <button type="submit" name="_method" value="DELETE" class="rounded-md" name="deletePost">
                                    <img src="../images/icons/trash.png" alt="trash" class="w-7" />
                                </button>
                            </form>
                        </div>
                    </div> >
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</div>

<div class="ui modal fullscreen newAdModal h-fit">
    <div class="bg-gray-100 py-5">
        <form method="POST" action="/admin/ads/create" enctype="multipart/form-data" class="flex flex-col items-center gap-y-5 newAd">
            <div class="flex justify-center gap-x-2 max-[425px]:flex-col">
                <span class="text-xl">nome: </span>
                <input type="text" name="adName" class=" w-96 border-2 border-black rounded-lg" />
            </div>
            <div class="flex justify-center gap-x-2">
                <span class="text-xl">Imagem:</span>
                <input type="file" name="adFile" id="adFileUpload" accept=".jpg, .jpeg, .png" />
            </div>
            <div id="previewInputAdImage">
            </div>
            <div class=" flex justify-center gap-x-2">
                <span class="text-xl">Posição:</span>
                <select name="adPosition" class="text-xl">
                    <option value="mobile">
                        Mobile</option>
                    <option value="front">
                        Frente</option>
                    <option value="slide">
                        Slide</option>
                </select>
            </div>
            <div class="flex justify-center gap-x-2 max-[425px]:flex-col">
                <span class="text-xl">Link:</span>
                <input type="text" name="adLink" class="border-2 border-black rounded-lg px-2 w-96" />
            </div>
            <div class="flex justify-center gap-x-2 ">
                <span class="text-xl">Início: </span>
                <input type="datetime-local" min="<?= $minTime ?>" name="adStarts_at" class="border-2 border-black rounded-lg px-2" />
            </div>

            <div class="flex justify-center gap-x-2">
                <span class="text-xl">Fim:</span>
                <input type="datetime-local" min="<?= $minTime ?>" name="adFinishs_at" class="border-2 border-black rounded-lg px-2" />
            </div>
            <div class="flex gap-x-3 mt-4">
                <button class="closeNewAdModalbtn text-white bg-red-500 close p-2 rounded-md text-sm font-bold">
                    Fechar</button>
                <button type="submit" class="text-white bg-black p-2 rounded-md text-sm font-bold">Adicionar
                    Anúncio</button>
            </div>
        </form>
    </div>
</div>
<div class="ui modal fullscreen updateAdModal h-fit">
    <div class="bg-gray-100 py-5">
        <form method="POST" action="/admin/ads/update" enctype="multipart/form-data" class="flex flex-col items-center gap-y-5 updateAd">
            <div class="flex justify-center gap-x-2">
                <span class="text-xl">nome: </span>
                <input id="modalUpdateAdAreaName" type="text" disabled class="w-96 border-2 border-black rounded-lg" />
                <input id="modalUpdateAdAreaHiddenName" type="hidden" name="adName" class="w-96 border-2 border-black rounded-lg" />
            </div>
            <div class="flex justify-center gap-x-2">
                <span class="text-xl">Imagem:</span>
                <input type="file" name="adUpdateFileUpload" class="adUpdateFileUpload" accept=".jpg, .jpeg, .png" />
            </div>
            <div id="previewUploadInputAdImage"></div>
            <div class=" flex justify-center gap-x-2">
                <span class="text-xl">Posição:</span>
                <select id="modalUpdateAdAreaPosition" name="adPosition" class="text-xl">
                    <option value="none">Selecione uma posição</option>
                    <option value="mobile">Mobile</option>
                    <option value="front">Frente</option>
                    <option value="slide">Slide</option>
                </select>
            </div>
            <div class="flex justify-center gap-x-2">
                <span class="text-xl">Link:</span>
                <input type="text" name="adLink" value="<?= $ad["link"] ?>" class="border-2 border-black rounded-lg px-2 w-96" />
            </div>
            <div class="flex justify-center gap-x-2">
                <span class="text-xl">Início: </span>
                <input type="datetime-local" min="<?= $minTime ?>" id="modalUpdateAdAreaStartsAt" name="adStarts_at" class="border-2 border-black rounded-lg px-2" />
            </div>
            <div class="flex justify-center gap-x-2">
                <span class="text-xl">Fim:</span>
                <input type="datetime-local" min="<?= $minTime ?>" id="modalUpdateAdAreaFinishsAt" name="adFinishs_at" class="border-2 border-black rounded-lg px-2" />
            </div>
            <input type="hidden" id="modalUpdateAdAreaId" name="updateAdId" />
            <div class="flex gap-x-3 mt-4">
                <button type="button" class="closeUpdateAdModalbtn text-white bg-red-500 close p-2 rounded-md text-sm font-bold">
                    Fechar</button>
                <button type="submit" name="_method" value="put" class="text-white bg-black p-2 rounded-md text-sm font-bold">Atualizar
                    Anúncio </button>
            </div>
        </form>
    </div>
</div>