<div class="h-full w-full flex flex-col justify-start">
    <form method="post" action="/admin/editar/update" class="flex justify-between text-center px-5 w-full h-fit pt-2 mb-5">
        <div class="flex justify-start flex-col w-full gap-y-5 overflow-y-auto">
            <button type="submit" name="_method" value="put" class="ui approve button">Atualizar</button>
            <input type="text" name="title" value="<?= $post["title"]; ?>" class="bg-slate-300 px-2 outline-none rounded-md border border-black placeholder:text-black placeholder:text-opacity-30" placeholder="nome do post" />
            <?php if ($_SESSION["user"]["role"] == "dir"): ?>
                Criado por :
                <input type="datetime-local" name="post_at" min="<?= $minTime ?>" class="post_at" <?php if ($_SESSION["user"]["role"] != "dir"): ?>disabled <?php endif; ?> />
                <select id="section" name="section" class="rounded-md border border-black mb-3">
                    <option value="0" <?php if ($post["section"] == "0") : ?> selected<?php endif; ?>>Sem Posição</option>
                    <option value="n1" <?php if ($post["section"] == "n1") : ?> selected<?php endif; ?>>n1</option>
                    <option value="n2" <?php if ($post["section"] == "n2") : ?> selected<?php endif; ?>>n2</option>
                    <option value="n3" <?php if ($post["section"] == "n3") : ?> selected<?php endif; ?>>n3</option>
                    <option value="n4" <?php if ($post["section"] == "n4") : ?> selected<?php endif; ?>>n4</option>
                </select>
            <?php endif; ?>
            <div class="previewEditImage"></div>
            <div class="ui approve button openEditImageModalBtn">Mudar Thumb</div>
            <input type="hidden" class="oldContentMobile" value="<?= $post["content"] ?>" />
            <input type="hidden" class="oldPost_atMobile" value="<?= $post["post_at"] ?>" />
            <input type="hidden" class="oldImageThumbMobile" name="image" value="<?= $post["image"] ?>" />
            <input type="hidden" name="id" value="<?= $post["id"] ?>" />
            <input type="hidden" class="contentMobile" name="content" />
            <input type="hidden" class="image_idMobile" name="image_id" value="<?= $post["image_id"] ?>" />

        </div>
    </form>
    <div class="w-full">
        <div class="h-full flex items-start justify-center">
            <textarea class="editor">Carregando Editor...</textarea>
        </div>
    </div>
</div>