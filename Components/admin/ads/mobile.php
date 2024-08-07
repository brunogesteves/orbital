<section class="w-full min-h-[calc(100vh_-_340px)]">    
    <select class="selectAdTab w-full py-5 rounded-lg border-2 border-black">
        <option value="mobileAdsfront">Frente</option>
        <option value="mobileAdsMobile">Mobile</option>
        <option value="mobileAdsSlide">Slide</option>
    </select>
    <button class="openNewModalbtn text-white bg-black my-7 p-2 ml-4 rounded-lg text-xl">Adicionar
        Anúncio</button>
    <div id="mobileAdsfront" class="h-full">
        <?php
        foreach ($frontAds as $ad) : ?>
            <div class="flex flex-col justify-between items-center h-auto w-full my-2 gap-y-2 px-3 py-2">
                <img src="../images/ads/<?= $ad['file'] ?>" class=" w-full object-fit object-center" />
                <p class="w-auto font-bold text-xl">
                    <?= $ad["name"] ?>
                </p>
                <p class="w-auto">
                    <?= $ad["link"] ?>
                </p>
                <p class="w-24">
                    <?= date("d/m/Y h:i:s A", $ad["starts_at"]); ?>
                </p>
                <p class="w-24 ">
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
            <div class="ui modal fullscreen updateAdModal h-fit">
                <div class="bg-gray-100 py-5 px-2">
                    <form method="POST" action="/admin/ads/update" enctype="multipart/form-data" class="flex flex-col items-center gap-y-5 updateAd">
                        <div class="flex justify-center gap-x-2 w-full">
                            <span class="text-xl">nome: </span>
                            <input type="text" disabled class=" w-96 border-2 border-black rounded-lg" value="<?= $ad["name"] ?>" />
                        </div>
                        <div class="flex justify-center gap-x-2">
                            <span class="text-xl">Imagem:</span>
                            <input type="file" name="adUpdateFileUpload" class="adUpdateFileUpload" accept=".jpg, .jpeg, .png" />
                        </div>
                        <div class="previewUploadInputAdImage">
                            <img src="../images/ads/<?= $ad["file"] ?>" class=" thumb-image w-full " />`
                        </div>
                        <div class=" flex justify-center gap-x-2">
                            <span class="text-xl">Posição:</span>
                            <select name="adPosition" class="text-xl">
                                <option value="none">Selecione uma posição</option>
                                <option value="mobile" <?= $ad["position"] == "mobile" ? "selected" : "" ?>>
                                    Mobile</option>
                                <option value="front" <?= $ad["position"] == "front" ? "selected" : "" ?>>
                                    Frente</option>
                                <option value="slide" <?= $ad["position"] == "slide" ? "selected" : "" ?>>
                                    Slide</option>
                            </select>
                        </div>
                        <div class="flex justify-center gap-x-2 w-full">
                            <span class="text-xl">Link:</span>
                            <input type="text" name="adLink" value="<?= $ad["link"] ?>" class="border-2 border-black rounded-lg px-2 w-96" />
                        </div>
                        <div class="flex justify-center gap-x-2">
                            <span class="text-xl">Início: </span>
                            <input type="datetime-local" min="<?= $minTime ?>" name="adStarts_at" value="<?= (new DateTime(date("Y-m-d h:i ", $ad["starts_at"])))->format('Y-m-d\TH:i')
                                                                                                            ?>" class="border-2 border-black rounded-lg px-2" />
                        </div>
                        <div class="flex justify-center gap-x-2">
                            <span class="text-xl">Fim:</span>
                            <input type="datetime-local" min="<?= $minTime ?>" name="adFinishs_at" value="<?= (new DateTime(date("Y-m-d h:i ", $ad["finishs_at"])))->format('Y-m-d\TH:i')
                                                                                                                ?? $_POST["adStarts_at"] ?>" class="border-2 border-black rounded-lg px-2" />
                        </div>
                        <input type="hidden" name="updateAdId" value="<?= $ad["id"] ?>" />
                        <input type="hidden" name="adName" value="<?= $ad["name"] ?>" />
                        <div class="flex gap-x-3 mt-4">
                            <button type="button" class="closeUpdateAdModalbtn bg-red-600 hover:bg-red-700 px-3 py-1 rounded text-white mr-1">
                                Cancelar
                            </button>
                            <button type="submit" name="_method" value="put" class="text-white bg-black p-2 rounded-md text-sm font-bold">Atualizar
                                Anúncio</button>
                        </div>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div id="mobileAdsMobile" class="h-full hidden">
        <?php
        foreach ($mobileAds as $ad) : ?>
            <div class="flex flex-col justify-between items-center h-auto w-full my-2 gap-y-2 px-3 py-2">
                <img src="../images/ads/<?= $ad['file'] ?>" class=" w-full object-fit object-center" />
                <p class="w-auto font-bold text-xl">
                    <?= $ad["name"] ?>
                </p>
                <p class="w-auto">
                    <?= $ad["link"] ?>
                </p>
                <p class="w-24">
                    <?= date("d/m/Y h:i:s A", $ad["starts_at"]); ?>
                </p>
                <p class="w-24">
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
            <div class="ui modal fullscreen updateAdModal h-fit">
                <div class="bg-gray-100 py-5 px-2">
                    <form method="POST" action="/admin/ads/update" enctype="multipart/form-data" class="flex flex-col items-center gap-y-5 updateAd">
                        <div class="flex justify-center gap-x-2 w-full">
                            <span class="text-xl">nome: </span>
                            <input type="text" disabled class=" w-96 border-2 border-black rounded-lg" value="<?= $ad["name"] ?>" />
                        </div>
                        <div class="flex justify-center gap-x-2">
                            <span class="text-xl">Imagem:</span>
                            <input type="file" name="adUpdateFileUpload" class="adUpdateFileUpload" accept=".jpg, .jpeg, .png" />
                        </div>
                        <div class="previewUploadInputAdImage">
                            <img src="../images/ads/<?= $ad["file"] ?>" class=" thumb-image w-full " />`
                        </div>
                        <div class=" flex justify-center gap-x-2">
                            <span class="text-xl">Posição:</span>
                            <select name="adPosition" class="text-xl">
                                <option value="none">Selecione uma posição</option>
                                <option value="mobile" <?= $ad["position"] == "mobile" ? "selected" : "" ?>>
                                    Mobile</option>
                                <option value="front" <?= $ad["position"] == "front" ? "selected" : "" ?>>
                                    Frente</option>
                                <option value="slide" <?= $ad["position"] == "slide" ? "selected" : "" ?>>
                                    Slide</option>
                            </select>
                        </div>
                        <div class="flex justify-center gap-x-2 w-full">
                            <span class="text-xl">Link:</span>
                            <input type="text" name="adLink" value="<?= $ad["link"] ?>" class="border-2 border-black rounded-lg px-2 w-96" />
                        </div>
                        <div class="flex justify-center gap-x-2">
                            <span class="text-xl">Início: </span>
                            <input type="datetime-local" min="<?= $minTime ?>" name="adStarts_at" value="<?= (new DateTime(date("Y-m-d h:i ", $ad["starts_at"])))->format('Y-m-d\TH:i')
                                                                                                            ?>" class="border-2 border-black rounded-lg px-2" />
                        </div>
                        <div class="flex justify-center gap-x-2">
                            <span class="text-xl">Fim:</span>
                            <input type="datetime-local" min="<?= $minTime ?>" name="adFinishs_at" value="<?= (new DateTime(date("Y-m-d h:i ", $ad["finishs_at"])))->format('Y-m-d\TH:i')
                                                                                                                ?? $_POST["adStarts_at"] ?>" class="border-2 border-black rounded-lg px-2" />
                        </div>
                        <input type="hidden" name="updateAdId" value="<?= $ad["id"] ?>" />
                        <input type="hidden" name="adName" value="<?= $ad["name"] ?>" />
                        <div class="flex gap-x-3 mt-4">
                            <button class="closeUpdateAdModalbtn text-white bg-red-500 close p-2 rounded-md text-sm font-bold">
                                Fechar</button>
                            <button type="submit" name="_method" value="put" class="text-white bg-black p-2 rounded-md text-sm font-bold">Atualizar
                                Anúncio</button>
                        </div>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div id="mobileAdsMobile" class="h-full hidden">      
        <div class="flex flex-col h-[calc(100vh_-_300px)] ads overflow-y-auto">
            <?php
            foreach ($slideAds as $ad) : ?>
                <img src="../images/ads/<?= $ad['file'] ?>" class=" w-full object-fit object-center" />
                <input type="hidden" name="recentStatus" value=<?= $ad["status"] == "on" ? "off" : "on" ?> />
                <div class="flex justify-between items-center h-auto w-full my-2 px-3 py-2 gap-x-1 ">
                    <p class="w-auto font-bold text-xl">
                        <?= $ad["name"] ?>
                    </p>
                    <p class="w-auto">
                        <?= $ad["link"] ?>
                    </p>
                    <p class="w-24">
                        <?= date("d/m/Y h:i:s A", $ad["starts_at"]); ?>
                    </p>
                    <p class="w-24">
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
                <div class="ui modal fullscreen updateAdModal h-fit">
                    <div class="bg-gray-100 py-5 px-2">
                        <form method="POST" action="/admin/ads/update" enctype="multipart/form-data" class="flex flex-col items-center gap-y-5 updateAd">
                            <div class="flex justify-center gap-x-2 w-full">
                                <span class="text-xl">nome: </span>
                                <input type="text" disabled class=" w-96 border-2 border-black rounded-lg" value="<?= $ad["name"] ?>" />
                            </div>
                            <div class="flex justify-center gap-x-2">
                                <span class="text-xl">Imagem:</span>
                                <input type="file" name="adUpdateFileUpload" class="adUpdateFileUpload" accept=".jpg, .jpeg, .png" />
                            </div>
                            <div class="previewUploadInputAdImage">
                                <img src="../images/ads/<?= $ad["file"] ?>" class=" thumb-image w-full " />`
                            </div>
                            <div class=" flex justify-center gap-x-2">
                                <span class="text-xl">Posição:</span>
                                <select name="adPosition" class="text-xl">
                                    <option value="none">Selecione uma posição</option>
                                    <option value="mobile" <?= $ad["position"] == "mobile" ? "selected" : "" ?>>
                                        Mobile</option>
                                    <option value="front" <?= $ad["position"] == "front" ? "selected" : "" ?>>
                                        Frente</option>
                                    <option value="slide" <?= $ad["position"] == "slide" ? "selected" : "" ?>>
                                        Slide</option>
                                </select>
                            </div>
                            <div class="flex justify-center gap-x-2 w-full">
                                <span class="text-xl">Link:</span>
                                <input type="text" name="adLink" value="<?= $ad["link"] ?>" class="border-2 border-black rounded-lg px-2 w-96" />
                            </div>
                            <div class="flex justify-center gap-x-2">
                                <span class="text-xl">Início: </span>
                                <input type="datetime-local" min="<?= $minTime ?>" name="adStarts_at" value="<?= (new DateTime(date("Y-m-d h:i ", $ad["starts_at"])))->format('Y-m-d\TH:i')
                                                                                                                ?>" class="border-2 border-black rounded-lg px-2" />
                            </div>
                            <div class="flex justify-center gap-x-2">
                                <span class="text-xl">Fim:</span>
                                <input type="datetime-local" min="<?= $minTime ?>" name="adFinishs_at" value="<?= (new DateTime(date("Y-m-d h:i ", $ad["finishs_at"])))->format('Y-m-d\TH:i')
                                                                                                                    ?? $_POST["adStarts_at"] ?>" class="border-2 border-black rounded-lg px-2" />
                            </div>
                            <input type="hidden" name="updateAdId" value="<?= $ad["id"] ?>" />
                            <input type="hidden" name="adName" value="<?= $ad["name"] ?>" />
                            <div class="flex gap-x-3 mt-4">
                                <button class="closeUpdateAdModalbtn text-white bg-red-500 close p-2 rounded-md text-sm font-bold">
                                    Fechar</button>
                                <button type="submit" name="_method" value="put" class="text-white bg-black p-2 rounded-md text-sm font-bold">Atualizar
                                    Anúncio</button>
                            </div>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>