<div class="h-[calc(100vh_-_161px)] w-full flex justify-start">
    <div class="w-2/12">
        <?php
        var_dump($post["section"]);
        include "views/partials/admin/sidebar.php";
        ?>
    </div>
    <section class="w-10/12 flex justify-center items-start">
        <div class="w-4/12 h-fit flex flex-col">
            <form method="post" action="/admin/editar/update" class="flex justify-between text-center px-5 w-full h-full pt-2 ">
                <div class="flex justify-start flex-col w-full gap-y-5 overflow-y-auto">
                <button type="submit" name="_method" value="put" class="ui approve button editpost">Atualizar</button>
                    <input type="text" name="title" value="<?= $post["title"]; ?>" class="bg-slate-300 px-2 outline-none rounded-md border border-black placeholder:text-black placeholder:text-opacity-30" placeholder="nome do post" />                    
                    <input type="datetime-local" name="post_at" min="<?= $minTime ?>" class="post_at" />
                    <select id="section" name="section" class="rounded-md border border-black mb-3">
                        <option value="n1" <?php if ($post["section"] == "n1") : ?> selected<?php endif; ?>>n1</option>
                        <option value="n2" <?php if ($post["section"] == "n2") : ?> selected<?php endif; ?>>n2</option>
                        <option value="n3" <?php if ($post["section"] == "n3") : ?> selected<?php endif; ?>>n3</option>
                        <option value="n4" <?php if ($post["section"] == "n4") : ?> selected<?php endif; ?>>n4</option>
                    </select>
                    <div class="previewEditImage"></div>
                    <div class="ui approve button openEditImageModalBtn">Mudar uma Thumb</div>                    
                    <input type="hidden" class="oldContentComputer" value="<?= htmlentities($post["content"]) ?>" />
                    <input type="hidden" class="oldPost_at" value="<?= $post["post_at"] ?>" />
                    <input type="hidden" class="oldImageThumbComputer" value="<?= $post["image"] ?>" />
                    <input class="image_id" type="hidden" name="id" value="<?= $post["id"] ?>"/>
                    <input type="hidden" name="content" class="content" />
                    <input class="image_id" type="hidden" name="image_id" value="<?= $post["image_id"] ?>"/>
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
<div class="ui modal editImageModal h-screen">
    <div class="flex justify-start gap-x-5 flex-wrap overflow-y-auto gap-y-5">
        <div class="closeEditImageModalBtn pl-3 mt-3 cursor-pointer">X</div>
        <?php
        foreach ($images as $image) : ?>
            <div class="cursor-pointer w-1/6 m-2 h-[150px] max-[425px]:w-full max-[425px]:h-auto">
                <div class="ui dimmable image">
                    <div class="ui dimmer">
                        <div class="">
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
    <div class="text-xl ml-3 mt-3 cursor-pointer closeImage">X</div>
    <div class="modalImage" class="flex justify-center mb-5"></div>
</div>

<script src="../scripts/editpost.js" defer></script>
<script src="../scripts/suneditor.min.js"></script>
<script src="../scripts/pt.js" defer></script>
<link href="../styles/suneditor.min.css" rel="stylesheet" />