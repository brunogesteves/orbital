<section class="w-full min-h-[calc(100vh_-_340px)]">
    <select class="selectAdTab w-full py-5 rounded-lg border-2 border-black">
        <option value="adsfront">Frente</option>
        <option value="adsMobile">Mobile</option>
        <option value="adsSlide">Slide</option>
    </select>
    <div id="adsfront" class="ui active tab">
        <button class="openNewModalbtn text-white bg-black my-7 p-2 rounded-lg text-xl">Adicionar
            Anúncio1</button>

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
    <div id="adsMobile" class="ui tab">
        <button class="openNewModalbtn text-white bg-black my-7 p-2 rounded-lg text-xl">Adicionar
            Anúncio2</button>

        <div class="flex flex-col ads overflow-y-auto h-[calc(100vh_-_300px)]">
            <?php
            foreach ($mobileAds as $ad) : ?>
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
    <div id="adsSlide" class="ui tab">
        <button class="openNewModalbtn text-white bg-black my-7 p-2 rounded-lg text-xl">Adicionar
            Anúncio3</button>

        <div class="flex flex-col ads overflow-y-auto h-[calc(100vh_-_300px)]">
            <?php
            foreach ($slideAds as $ad) : ?>
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
</section>