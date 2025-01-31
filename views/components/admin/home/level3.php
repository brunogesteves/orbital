<div class="postsArea flex justify-start flex-wrap items-center h-auto w-full gap-5 overflow-hidden">
    <?php foreach ($level3 as $post): ?>
        <div class="w-1/4 max-[767px]:w-full h-full relative bg-black cursor-pointer">
            <img src=<?= insertImage($post["image"]) ?> class="w-full  hover:opacity-50 " />
            <p class=" title absolute top-0 left-0 text-white text-xl pl-3 shadow">
                titulo
            </p>
            <p class="w-auto nameAuthor absolute top-10 left-0 text-white text-xl pl-3">
                author
            </p>
            <p class="w-5 section absolute top-20 left-0 text-white text-xl pl-3">
                section
            </p>
            <p class="w-24 startsAt absolute top-32 left-0 text-white text-xl pl-3">
                postAt
            </p>
            <a href="/admin/editar?id=<?= $post["id"] ?>"
                class="bg-black hover:bg-red-700 px-3 py-1 rounded text-white m-3 absolute bottom-0 right-0 ">
                Editar
            </a>
            <form method="POST" action="/admin/post/publish"
                class="bg-black hover:bg-red-700 px-3 py-1 rounded text-white m-3 absolute bottom-10 right-0">
                <input type="hidden" name="postId" value=<?= $post['id'] ?> />
                <input type="hidden" name="recentStatus" value=<?= $post["status"] == "on" ? "off" : "on" ?>>
                <button type="submit" class="rounded-md" name="_method" value="put"
                    class="bg-black hover:bg-red-700 px-3 py-1 rounded text-white m-3">
                    <?= $post["status"] == "on" ? "Despublicar" : "Publicar" ?>
                </button>
            </form>
            <form method="POST" action="/admin/post/destroy" class="flex items-center absolute top-2 right-2">
                <input type="hidden" name="deletePostId" value=<?= $post['id'] ?> />
                <button type="submit" class="rounded-md" name="_method" value="DELETE">
                    <img src=<?= insertImage("icons/trash.png") ?> alt="trash" class="w-7" />
                </button>
            </form>
        </div>
    <?php endforeach; ?>
</div>