<?php
include insertComponent("admin/header.php");
?>

<!-- <div id="size"></div> -->
<div class="mx-auto mt-2 flex">
    <?php
    include insertComponent("admin/sidebar.php");
    ?>
    <main class="w-full max-[768px]:w-full  flex flex-col justify-center items-center h-[calc(100vh_-_261px)]">
        <form method="POST" action="search/makesearch" enctype="multipart/form-data" class="flex flex-col h-auto">
            <input type="text" name="searchTerm" class="border-2 rounded-lg border-black pl-3 bg-slate-200"
                placeholder="Digite o termo" />
            <button type="submit" class="w-full text-white bg-black my-7 p-2 rounded-lg text-xl">Procurar</button>
        </form>
        <div class=" w-full h-[calc(100vh_-_261px)] overflow-y-auto flex flex-wrap justify-start items-start">
            <?php foreach ($searchResults  as $post): ?>
                <div class="w-1/4 max-[767px]:w-full h-auto relative cursor-pointer p-1">
                    <img src=<?= insertAdminImage($post["image"]) ?> class=" w-full  opacity-50 hover:opacity-80 " />
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
                </div>
            <?php endforeach; ?>

        </div>
    </main>
</div>

<?php
include insertComponent("admin/footer.php");
?>