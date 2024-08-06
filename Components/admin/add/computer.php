<div class="h-[calc(100vh_-_161px)] w-full flex justify-start">
    <div class="w-2/12">
        <?php
        include "views/partials/admin/sidebar.php";
        ?>
    </div>
    <section class="w-10/12 flex justify-center items-start">
        <div class="w-4/12 h-fit flex flex-col">
            <form method="post" name="addpost" action="/admin/adicionar/create" class="flex justify-between text-center px-5 w-full h-full pt-2 ">
                <div class="flex justify-start flex-col w-full gap-y-5 overflow-y-auto">
                    <button type="submit" class="ui approve button">Salvar</button>
                    <input type="text" name="title"  class="bg-slate-300 px-2 outline-none rounded-md border border-black placeholder:text-black placeholder:text-opacity-30" placeholder="nome do post" />
                    <input type="datetime-local" name="post_at" min="<?= $minTime ?>" >
                    <select id="section" name="section" class="rounded-md border border-black mb-3">
                        <option value="n1">n1</option>
                        <option value="n2">n2</option>
                        <option value="n3">n3</option>
                        <option value="n4">n4</option>
                    </select>
                    <div class="previewImage"></div>
                    <div class="ui approve button openAddImageModalBtn">Selecione uma Thumb</div>                    
                    <input type="hidden" name="image_id" class="image_id" />
                    <input type="hidden" name="content"  class="content"/>
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
<div class="ui modal addImageModal bg-red-300  h-screen">
    <div class="flex justify-start gap-x-5 flex-wrap overflow-y-auto gap-y-5">
        <div class="closeAddImageModalBtn pl-3 mt-3 cursor-pointer">X</div>
        <?php
        foreach ($images as $image) : ?>
            <div class="cursor-pointer w-1/6 m-2 h-[150px] max-[425px]:w-full max-[425px]:h-auto">
                <div class="ui dimmable image">
                    <div class="ui dimmer">
                        <div>
                            <div class="ui button seeImage">Ver</div>
                            <button class="ui primary button selectImage">Selecionar</button>
                            <input type="hidden" value=<?= $image["name"] ?> class="imageName" />
                            <input type="hidden" value=<?= $image["id"] ?> class="imageId" />

                        </div>
                    </div>
                    <img src="../images/<?= $image["name"] ?>" alt=<?= $image["name"] ?> class="w-full min-h-40" />
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<div class="ui modal fullScreen modalSelectImage">
    <div class="text-2xl ml-3 mt-3 cursor-pointer closeImage">X</div>
    <div id="modalImage" class="flex justify-center mb-5"></div>
</div>
<script src="../scripts/addpost.js"></script>
<script src="../scripts/suneditor.min.js" defer></script>
<script src="../scripts/pt.js" defer></script>
<link href="../styles/suneditor.min.css" rel="stylesheet" />