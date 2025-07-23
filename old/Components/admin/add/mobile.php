<div class="h-full w-full flex flex-col justify-start">
    <form method="post" action="/admin/adicionar/create" class="flex justify-between text-center px-5 w-full h-fit pt-2 mb-5 addPostMobile">
        <div class="flex justify-start flex-col w-full gap-y-5 overflow-y-auto">
            <button type="submit" class="ui approve button">Salvar</button>
            <input type="text" name="title" value="<?= $tempContent["title"]; ?>" class="bg-slate-300 px-2 outline-none rounded-md border border-black placeholder:text-black placeholder:text-opacity-30" placeholder="nome do post" />
            <?php if ($_SESSION["user"]["role"] == "dir"): ?>
                <input type="datetime-local" name="post_at" min="<?= $minTime ?>" class="post_at" <?php if ($_SESSION["user"]["role"] != "dir"): ?>disabled <?php endif; ?> />
                <select id="section" name="section" class="rounded-md border border-black mb-3">
                    <option value="0">Sem Posição</option>
                    <option value="n1">n1</option>
                    <option value="n2">n2</option>
                    <option value="n3">n3</option>
                    <option value="n4">n4</option>
                </select>
            <?php endif; ?>
            <div class="previewImage"></div>
            <div class="ui approve button openAddImageModalBtn">Selecione uma Thumb</div>
            <input class="image_id" type="hidden" name="image_id" />
            <input type="hidden" name="content" class="content">

        </div>
    </form>
    <div class="w-full">
        <div class="h-full flex items-start justify-center">
            <textarea class="editor">Carregando Editor...</textarea>
        </div>
    </div>
</div>