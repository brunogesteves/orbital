<?php if ($_SESSION["user"]["role"] == "dir"): ?>
    <div class="flex justify-center w-full my-3">
        <span class="text-3xl mr-3">O nível 4 tem: </span>
        <span class="text-3xl <?php if (sizeof($level4) < 9) echo "text-red-500";  ?>">
            <?= sizeof($level4) ?></span>
        <span class="text-3xl"> / 9</span>
    </div>
<?php endif; ?>
<div class="postsArea flex justify-start flex-wrap items-center h-auto w-full">
    <?php foreach ($level4 as $post): ?>
        <div class="w-1/4 max-[767px]:w-full h-full relative cursor-pointer p-1">
            <img src=<?= insertImage($post["image"]) ?> class=" w-full  opacity-50 hover:opacity-80 " />
            <p class=" title absolute top-1 left-0 text-sm pl-3 shadow font-bold text-black">
                título: <?= $post["title"] ?>
            </p>
            <p class="nameAuthor absolute top-12 mt-3 uppercase left-0 font-bold text-black text-sm pl-3">
                autor: <?= $post["authorName"] ?>
            </p>
            <p class=" section absolute top-20 left-0 mt-3 font-bold text-black text-sm pl-3">
                seção: <?= $post["section"] ?>
            </p>
            <p class="startsAt absolute top-32 left-0 font-bold text-black text-sm pl-3">
                dia: <?= date("d-m-Y H:i", $post["post_at"]) ?>
            </p>
            <a href="/admin/editar?id=<?= $post["id"] ?>"
                class="bg-black hover:bg-red-700 px-3 py-1 rounded font-bold text-white m-3 absolute bottom-0 right-0 ">
                Editar
            </a>
            <?php if ($_SESSION["user"]["role"] == "dir"): ?>
                <form method="POST" action="/admin/post/publish"
                    class="bg-black hover:bg-red-700 px-3 py-1 rounded text-white m-3 absolute bottom-10 right-0">
                    <input type="hidden" name="postId" value=<?= $post['id'] ?> />
                    <input type="hidden" name="recentStatus" value=<?= $post["status"] == "on" ? "off" : "on" ?>>
                    <button type="submit" class="rounded-md" name="_method" value="put"
                        class="bg-black hover:bg-red-700 px-3 py-1 rounded text-white m-3">
                        <?= $post["status"] == "on" ? "Despublicar" : "Publicar" ?>
                    </button>
                </form>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</div>