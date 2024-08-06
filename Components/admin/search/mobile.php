<section class="flex flex-col w-full min-h-[calc(100vh_-_312px)]">
        
            <form method="POST" action="procurar/search" class="w-full h-auto flex justify-center items-center flex-col gap-y-3">
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
        
        <div class=" h-auto overflow-y-auto w-full">
            <?php
            foreach ($_SESSION["search_content"] as $results => $result) : ?>
                <div class="flex justify-between flex-col items-center h-auto gap-x-3 p-7">
                    <img src="<?= $result->media ?>" class="w-full h-auto object-scale-down" />
                    <p>
                        <?= $result->title ?>
                    </p>
                    <div class="flex gap-x-5">
                        <button class="openExternalInfoMobileModalbtn bg-red-600 hover:bg-red-700 px-3 py-1 rounded text-white m-5">
                            Verificar
                        </button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
</section>


<script src="../scripts/search.js"></script>