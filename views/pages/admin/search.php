<?php
include insertComponent("admin/header.php");
?>

<div class="mx-auto mt-2 flex">
    <?php
    include insertComponent("admin/sidebar.php");
    ?>
    <main class="w-full max-[768px]:w-full  flex flex-col justify-center items-center h-[calc(100vh_-_261px)]">
        <form method="GET" class="flex flex-col h-auto">
            <input type="text" id="searchTerm" class="border-2 rounded-lg border-black pl-3 bg-slate-200"
                placeholder="Digite o termo" />
            <button type="button" id="makeSearch"
                class="w-full text-white bg-black my-7 p-2 rounded-lg text-xl">Procurar</button>
        </form>
        <div class=" w-full h-[calc(100vh_-_261px)] overflow-y-auto flex flex-wrap justify-start items-start">
            <div id="searchResults" class="flex justify-start flex-wrap items-center w-full h-auto overflow-hidden">
            </div>

        </div>
    </main>
</div>

<?php
include insertComponent("admin/footer.php");
?>

<script src=<?= insertAdminScript("search.js") ?>></script>