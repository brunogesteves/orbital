<div class="h-[calc(100vh_-_161px)] w-full flex justify-start">
    <div class="w-2/12">
        <?php
        require "views/partials/admin/sidebar.php";
        ?>
    </div>
    <div class="w-10/12 min-h-[calc(100vh_-_312px)]">
        <form method="POST" action="procurar/search" class=" w-full h-20 flex justify-center items-center gap-x-3 mt-3">
            <input type="text" required name="searchTerm" class="bg-slate-300 rounded-md pl-2 outline-none" placeholder="buscar" />
            <select class="h-5" name="language" required>
                <option value="pt">Português</option>
                <?php
                foreach ($countries as $key => $values) : ?>
                    <option value=<?= $values ?>><?= $key ?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit" class="bg-slate-600 hover:bg-slate-700 px-3 py-1 rounded text-white m-5 cursor-pointer">Pesquisar
            </button>
        </form>
        <div class="overflow-y-auto w-full h-[calc(100vh_-_240px)]">
            <?php
            foreach ($_SESSION["search_content"] as $results => $result) : ?>
                <div class="flex justify-between items-center h-auto gap-x-3 p-3">
                    <img src="<?= $result->media ?>" class="w-28 h-auto object-scale-down" />
                    <p>
                        <?= $result->title ?>
                    </p>
                    <input type="hidden" value="<?= $result->title ?>" class="inputSearchTitle" />
                    <input type="hidden" value="<?= $result->media ?>" class="inputSearchMedia" />
                    <input type="hidden" value="<?= $result->clean_url ?>" class="inputSearchClean_url" />
                    <input type="hidden" value="<?= $result->summary ?>" class="inputSearchSummary" />
                    <input type="hidden" value="<?= $result->link ?>" class="inputSearchLink" />
                    <div class="flex gap-x-5">
                        <button class="openExternalInfoComputerModalbtn bg-red-600 hover:bg-red-700 px-3 py-1 rounded text-white m-5">
                            Verificar
                        </button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="ui modal fullScreen externalInfoModal">
        <p class="externalInfoModalTitle max-[425px]:p-2 max-[425px]:font-bold"></p>
        <div class="flex max-[425px]:flex-col justify-start gap-x-2 p-5 max-[425px]:p-2">
            <div class="w-1/6 max-[425px]:w-full max-[425px]:text-center externalInfoModalMedia" ></div>
            <div class="w-5/6 max-[425px]:w-full text-justify">
                <div class="max-[425px]:flex max-[425px]:items-center max-[425px]:mt-2">
                    <span>Fonte:</span>
                    <p class="externalInfoModalClean_url"></p>
                </div>
                <div class="max-[425px]:mt-2">
                    <span>Conteúdo:</span>
                    <p class="externalInfoModalSummary"></p>
                </div>
            </div>
        </div>
        <div class="flex justify-center w-full items-center gap-x-10 ">
            <div class="flex justify-center items-start w-10 p-3 min-[1024px]:h-14">
                <form method="POST" action="procurar/addthirdparty" class="flex max-[425px]:flex-col gap-x-5 gap-y-4">
                    <input type="hidden" name="title" class="externalInfoModalTitle" />
                    <select name="section">
                        <option>n1</option>
                        <option>n2</option>
                        <option>n3</option>
                        <option>n4</option>
                    </select>
                    <input type="hidden" name="content" class="externalInfoModalSummary"/>
                    <input type="hidden" name="source"  class="externalInfoModalClean_url"/>
                    <input type="hidden" name="link"  class="externalInfoModalLink"/>
                    <input type="hidden" name="image"  class="externalInfoModalMedia"/>
                    <input required type="datetime-local" name="post_at" min="<?= $minTime ?>" />
                    <button type="submit" name="addExternalSource" class="bg-blue-600 hover:bg-blue-700 min-[1024px]:w-56 p-3 w-full rounded text-white cursor-pointer">
                        Adicionar
                    </button>
                    <button type="button" class="closeExternalInfoModalbtn bg-red-600 hover:bg-red-700 min-[1024px]:w-56 p-3 w-full rounded text-white mr-5">
                        Cancelar
                    </button>

                </form>
            </div>

        </div>
        <hr class="my-3">

    </div>

    <script src="../scripts/search.js"></script>