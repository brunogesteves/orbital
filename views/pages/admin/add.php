<?php
include insertComponent("admin/header.php");
?>

<div id="size"></div>
<div class="mx-auto mt-2 flex">
    <?php
    include insertComponent("admin/sidebar.php");
    ?>
    <main class="w-full max-[768px]:w-full h-full overflow-y-auto">
        <div
            class="flex max-[768px]:flex-col justify-center items-start w-full min-[768px]:h-[calc(100vh_-_261px)] overflow-y-auto ">
            <div class="w-3/12 max-[768px]:w-full h-full">
                <form id="postform" method="post" action="/admin/post/create"
                    class="flex justify-between text-center px-5 w-full h-full pt-2">
                    <div class="flex justify-start flex-col w-full gap-y-5 ">
                        <button type="submit" class="bg-black rounded-lg text-white py-1">Salvar</button>
                        <input type="text" name="title"
                            class="bg-slate-300 px-2 outline-none rounded-md border border-black placeholder:text-black placeholder:text-opacity-30"
                            placeholder="nome do post" />
                        <input type="datetime-local" name="post_at" min="<?= $minTime ?>" class="post_at" />
                        <select id="section" name="section" class="rounded-md border border-black mb-3">
                            <option value="">Sem Posição</option>
                            <option value="n1">n1</option>
                            <option value="n2">n2</option>
                            <option value="n3">n3</option>
                            <option value="n4">n4</option>
                        </select>

                        <select id="category" name="category" class="rounded-md border border-black mb-3">
                            <option value="">Escolha uma categoria</option>
                            <?php foreach ($AllCategories as $cat): ?>
                                <option value="<?= $cat["id"] ?>"><?= $cat["name"] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="previewImage"></div>
                        <button id="openDialogSelectImage" type="button"
                            class="bg-black rounded-lg text-white py-1 max-[768px]:mb-5">Selecione uma
                            Thumb</button>
                        <input type="hidden" name="image_id" id="image_id" />
                        <input type="hidden" name="content" class="content" />
                    </div>
                </form>

            </div>
            <div class="w-9/12 max-[768px]:w-full h-full max-[768px]:mb-10">
                <div class="h-full flex items-start justify-center">
                    <textarea class="editor">Carregando Editor...</textarea>
                </div>
            </div>
        </div>
    </main>
    <dialog id="dialogChooseImage" class="w-[95%] h-[90%] bg-blue-500 fixed pt-10">
        <div class="w-full flex justify-center items-center h-auto">
            <form id="newThumbForm" method="POST" enctype="multipart/form-data" class="flex flex-col">
                <input type="file" name="fileImageUpload" id="fileImageUpload" accept=".jpg, .jpeg, .png" />

                <div id="previewInputImage"> </div>
                <button type="button" id="submitNewImage"
                    class="w-full text-white bg-black my-7 p-2 rounded-lg text-xl">adicionar</button>
            </form>
        </div>
        <div class="allimages flex justify-start items-start h-full   min-[768px]:h-[calc(100vh_-_391px)] flex-wrap ">
            <?php
            foreach ($allImages as $image) : ?>
                <div data-image=<?= $image["file"] ?> data-id=<?= $image["id"] ?>
                    class="selectImage cursor-pointer w-1/4 max-[768px]:w-full p-1 h-auto relative group">
                    <img src=<?= insertAdminImage($image["file"]) ?> alt=<?= $image["name"] ?>
                        class="w-full object-scale-down max-h-full m-auto group-hover:opacity-50" />
                    <span class="absolute top-1/2 left-1/4 text-white text-6xl hidden group-hover:block">adicionar</span>
                </div>
            <?php endforeach; ?>
        </div>
        <button type="button" id="closeDialogSeeImage" class="text-white">
            <img src=<?= insertAdminImage("icons/close.png") ?> alt="close"
                class="size-4 max-[768px]:size-5 object-scale-down flex-none absolute top-4 right-4" />
        </button>
    </dialog>
</div>

<?php
include insertComponent("admin/footer.php");
?>
<script src=<?= insertAdminScript("addpost.js") ?>></script>
<script src=<?= insertAdminScript("suneditor.min.js") ?>></script>
<script src=<?= insertAdminScript("pt.js") ?>></script>
<script src=<?= insertAdminStyle("suneditor.min.css") ?>></script>
<link rel="stylesheet" type="text/css" href=<?= insertAdminStyle("suneditor.min.css") ?>>