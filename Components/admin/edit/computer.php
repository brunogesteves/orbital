<div class="h-[calc(100vh_-_161px)] w-full flex justify-start">
    <div class="w-2/12">
        <?php
        include "views/partials/admin/sidebar.php";
        ?>
    </div>
    <section class="w-10/12 flex justify-center items-start">
        <div class="w-4/12 h-fit flex flex-col">
            <form method="post" action="/admin/editar/update" class="flex justify-between text-center px-5 w-full h-full pt-2 editpostComputer">
                <div class="flex justify-start flex-col w-full gap-y-5 overflow-y-auto">
                    <button type="submit" name="_method" value="put" class="ui approve button">Atualizar</button>
                    <input type="text" name="title" value="<?= $post["title"]; ?>" class="bg-slate-300 px-2 outline-none rounded-md border border-black placeholder:text-black placeholder:text-opacity-30" placeholder="nome do post" />
                    <?php if ($_SESSION["user"]["role"] == "dir"): ?>
                        Criado por : <?= $post["authorName"] ?>
                        <input type="datetime-local" name="post_at" min="<?= $minTime ?>" class="post_at" <?php if ($_SESSION["user"]["role"] != "dir"): ?>disabled <?php endif; ?> />
                        <select id="section" name="section" class="rounded-md border border-black mb-3">
                            <option value="0" <?php if ($post["section"] == "0") : ?> selected<?php endif; ?>>Sem Posição</option>
                            <option value="n1" <?php if ($post["section"] == "n1") : ?> selected<?php endif; ?>>n1</option>
                            <option value="n2" <?php if ($post["section"] == "n2") : ?> selected<?php endif; ?>>n2</option>
                            <option value="n3" <?php if ($post["section"] == "n3") : ?> selected<?php endif; ?>>n3</option>
                            <option value="n4" <?php if ($post["section"] == "n4") : ?> selected<?php endif; ?>>n4</option>
                        </select>
                    <?php endif; ?>

                    <div class="previewImage"></div>

                    <div class="ui approve button openEditImageModalBtn">Mudar uma Thumb</div>
                    <input type="hidden" class="oldContentComputer" value="<?= htmlentities($post["content"]) ?>" />
                    <input type="hidden" class="oldPost_at" value="<?= $post["post_at"] ?>" />
                    <input type="hidden" class="oldImageThumbComputer" value="<?= $post["image"] ?>" />
                    <input type="hidden" name="id" value="<?= $post["id"] ?>" />
                    <input type="hidden" name="content" class="content" />
                    <input type="hidden" class="image_id" name="image_id" value="<?= $post["image_id"] ?>" />
                </div>
            </form>

        </div>
        <div class="w-8/12 z-0">
            <div class="h-full flex items-start justify-center">
                <textarea class="editor">Carregando Editor...</textarea>
            </div>
        </div>

    </section>
</div>
<div class="ui modal selectImageModal overflow-y-auto h-[calc(100vh_-_161px)]">
    <div class="flex justify-start gap-5 flex-wrap">
        <div class="closeEditImageModalBtn pl-3 mt-3 cursor-pointer">X</div>
        <div class="w-full flex justify-center mb-5">
            <button id="addNewImageBtn" class="p-5 bg-red-500 cursor-pointer">Adicionar</button>
        </div>
        <div id="allimages" class="flex justify-center items-center flex-wrap gap-10 max-[430px]:h-full">
        </div>
    </div>
</div>
<div class="ui modal fullScreen modalSelectImage">
    <div class="text-xl ml-3 mt-3 cursor-pointer closeImage">X</div>
    <div class="modalImage" class="flex justify-center mb-5"></div>
</div>
<div class="ui modal h-screen newImageModal ">
    <div class="closeAddImageModalBtn pl-3 my-3 cursor-pointer max-[430px]:text-xl">X</div>
    <div class="w-full flex max-[430px]:flex-col justify-center items-start max-[430px]:items-center gap-x-5">
        <input type="file" name="file" id="file" required accept=".jpg, .jpeg, .png" />
        <button type="button" id="submitNewImage" class="text-white bg-black my-7 p-2 rounded-lg text-xl">adicionar</button>
    </div>
    <div class="previewInputImage flex justify-center h-1/2"></div>
</div>