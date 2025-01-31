<?php
include insertComponent("admin/header.php");
?>

<div id="size"></div>
<div class="mx-auto mt-2 flex">
    <?php
    include insertComponent("admin/sidebar.php");
    ?>
    <main class="w-full max-[768px]:w-full  flex flex-col justify-center items-center h-[calc(100vh_-_261px)]">
        <form method="POST" action="imagens/create" enctype="multipart/form-data" class="flex flex-col h-auto">
            <input type="text" name="searchInput" class="border-2 rounded-lg border-black pl-3" />
            <div class="previewInputImage"> </div>
            <button type="submit" class="w-full text-white bg-black my-7 p-2 rounded-lg text-xl">Procurar</button>
        </form>

        <div class=" w-full h-[calc(100vh_-_261px)] overflow-y-auto flex flex-wrap justify-start items-center gap-5">
            <?php foreach ($images as $post): ?>
                <div class="w-1/4 max-[767px]:w-full h-auto relative bg-black">
                    <img src=<?= insertAdminImage("azeite.jpg") ?>
                        class="w-full  hover:opacity-50 max-[768px]:opacity-50" />
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
                    <p class="w-20 status absolute top-44 left-0 text-white text-xl pl-3">
                        Publicado
                    </p>
                    <button
                        class="openModalBtn bg-black hover:bg-red-700 px-3 py-1 rounded text-white m-3 absolute bottom-0 right-0 ">
                        Editar
                    </button>
                    <form method="POST" action="admin/destroy" class="flex items-center absolute top-2 right-2">
                        <button type="submit" class="rounded-md" name="_method" value="DELETE">
                            <img src=<?= insertAdminImage("icons/trash.png") ?> alt="trash" class="w-7" />
                        </button>
                    </form>
                </div>
            <?php endforeach; ?>

        </div>
    </main>
</div>

<dialog id="dialogSeeImage" class="w-fit h-fit bg-transparent fixed top-5">
    <didivd="watchTheImage">
        </didivd=>
        <button id="closeDialogSeeImage" class="text-white ">
            <img src=<?= insertAdminImage("icons/close.png") ?> alt="logo"
                class="size-4 max-[768px]:size-5 object-scale-down flex-none absolute top-4 right-4" />
        </button>
</dialog>

<?php
include insertComponent("admin/footer.php");
?>
<script src=<?= insertAdminScript("images.js") ?>></script>