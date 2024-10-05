<div class="h-[calc(100vh_-_161px)] w-full flex justify-start">
    <div class="w-2/12">
        <?php
        include "views/partials/admin/sidebar.php";
        ?>
    </div>
    <section class="w-10/12">
        <div class="flex flex-col h-auto overflow-y-auto w-full relative">
            <div class="ui top attached tabular menu">
                <a class="item active" data-tab="orbital">Orbital</a>
                <a class="item" data-tab="external">Externos</a>
                <a class="item" data-tab="level1">Nível 1</a>
                <a class="item" data-tab="level2">Nível 2</a>
                <a class="item" data-tab="level3">Nível 3</a>
                <a class="item" data-tab="level4">Nível 4</a>
                <a class="item" data-tab="automatics">Automáticos</a>
            </div>
            <div class="ui bottom attached tab segment active h-[calc(100vh_-_200px)] overflow-y-auto " data-tab="orbital">
                <?php
                foreach ($posts as $post) : ?>
                    <div class="flex justify-between items-center h-auto w-full my-2 px-3 py-2 gap-x-1">
                        <img src="/images/<?= $post['image'] ?>" class=" w-20 object-contain" />
                        <p class="w-96 title">
                            <?= $post["title"] ?>
                        </p>
                        <p class="w-auto source">
                            <?= $post["source"] ?>
                        </p>
                        <p class="w-5 section">
                            <?= $post["section"] ?>
                        </p>
                        <p class="w-24 startsAt">
                            <?= date("d-m-Y h:i ", $post["post_at"]) ?>
                        </p>
                        <p class="w-20 status">
                            <?= $post["status"] == "on" ? "Publicado" : "Fora do Ar" ?>
                        </p>

                        <input type="hidden" class="w-20 postId" value="<?= $post["id"] ?>" />
                        <input type="hidden" class="w-20 image" value="<?= $post["image"] ?>" />
                        <input type="hidden" class="w-20 postContent" value="<?= $post["content"] ?>" />


                        <div class="flex gap-x-1">
                            <button class="openModalBtn bg-black hover:bg-red-700 px-3 py-1 rounded text-white m-3">
                                Verificar
                            </button>
                            <form method="POST" action="admin/destroy" class="flex items-center">
                                <input type="hidden" name="deletePostId" value=<?= $post["id"] ?> />
                                <button type="submit" class="rounded-md" name="_method" value="DELETE">
                                    <img src="images/icons/trash.png" alt="trash" class="w-7" />
                                </button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="ui bottom attached tab segment h-[calc(100vh_-_200px)]  overflow-y-auto" data-tab="external">
                <?php
                foreach ($extposts as $post) : ?>
                    <div class="flex justify-between items-center h-auto w-full my-2 px-3 py-2 gap-x-1">
                        <img src=<?= $post["image"] ?> class="w-20 object-contain" />
                        <p class="w-96 title">
                            <?= $post["title"] ?>
                        </p>
                        <p class="w-auto source">
                            <?= $post["source"] ?>
                        </p>
                        <p class="w-5 section">
                            <?= $post["section"] ?>
                        </p>
                        <p class="w-24 startsAt">
                            <?= date("d-m-Y h:i ", $post["post_at"]) ?>
                        </p>
                        <p class="w-20 status">
                            <?= $post["status"] == "on" ? "Publicado" : "Fora do Ar" ?>
                        </p>
                        <input type="hidden" class="w-20 postId" value="<?= $post["id"] ?>" />
                        <input type="hidden" class="w-20 image" value="<?= $post["image"] ?>" />
                        <input type="hidden" class="w-20 postContent" value="<?= $post["content"] ?>" />
                        <div class="flex gap-x-1">
                            <button class="openModalBtn bg-black hover:bg-red-700 px-3 py-1 rounded text-white m-3">
                                Verificar
                            </button>
                            <form method="POST" action="admin/destroy" class="flex items-center">
                                <input type="hidden" name="DeleteExtPostId" value=<?= $post["id"] ?> />
                                <button type="submit" name="_method" value="DELETE" class=" rounded-md">
                                    <img src="/images/icons/trash.png" alt="trash" class="w-7" />
                                </button>
                            </form>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>
             <div class="ui bottom attached tab segment h-[calc(100vh_-_200px)] overflow-y-auto" data-tab="level1">
                No momento : <span class="<?= sizeof($posts1) > 4 ? 'text-red-500' : 'text-black-500' ?>"> <?= sizeof($posts1) ?></span>/4
                <?php
                foreach ($posts1 as $post) : ?>
                    <div class="flex justify-between items-center h-auto w-full my-2 px-3 py-2 gap-x-1">
                        <img src=<?= $post["source"] == "Orbital Channel" ? "/images/$post[image]" :  $post["image"] ?> alt="" class="w-20 object-contain" />
                        <p class="w-96 title">
                            <?= $post["title"] ?>
                        </p>
                        <p class="w-auto source">
                            <?= $post["source"] ?>
                        </p>
                        <p class="w-5 section">
                            <?= $post["section"] ?>
                        </p>
                        <p class="w-24 startsAt">
                            <?= date("d-m-Y h:i ", $post["post_at"]) ?>
                        </p>
                        <p class="w-20 status">
                            <?= $post["status"] == "on" ? "Publicado" : "Fora do Ar" ?>
                        </p>
                        <input type="hidden" class="w-20 postId" value="<?= $post["id"] ?>" />
                        <input type="hidden" class="w-20 image" value="<?= $post["image"] ?>" />
                        <input type="hidden" class="w-20 postContent" value="<?= $post["content"] ?>" />
                        <div class="flex gap-x-1">
                            <button class="openModalBtn bg-black hover:bg-red-700 px-3 py-1 rounded text-white m-3">
                                Verificar
                            </button>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>
             <div class="ui bottom attached tab segment h-[calc(100vh_-_200px)] overflow-y-auto" data-tab="level2">
                No momento : <span class="<?= sizeof($posts2) > 4 ? 'text-red-500' : 'text-black-500' ?>"> <?= sizeof($posts2) ?></span>/4
                <?php
                foreach ($posts2 as $post) : ?>
                    <div class="flex justify-between items-center h-auto w-full my-2 px-3 py-2 gap-x-1">
                        <img src=<?= $post["source"] == "Orbital Channel" ? "/images/$post[image]" :  $post["image"] ?> alt="" class="w-20 object-contain" />
                        <p class="w-96 title">
                            <?= $post["title"] ?>
                        </p>
                        <p class="w-auto source">
                            <?= $post["source"] ?>
                        </p>
                        <p class="w-5 section">
                            <?= $post["section"] ?>
                        </p>
                        <p class="w-24 startsAt">
                            <?= date("d-m-Y h:i ", $post["post_at"]) ?>
                        </p>
                        <p class="w-20 status">
                            <?= $post["status"] == "on" ? "Publicado" : "Fora do Ar" ?>
                        </p>
                        <input type="hidden" class="w-20 postId" value="<?= $post["id"] ?>" />
                        <input type="hidden" class="w-20 image" value="<?= $post["image"] ?>" />
                        <input type="hidden" class="w-20 postContent" value="<?= $post["content"] ?>" />
                        <div class="flex gap-x-1">
                            <button class="openModalBtn bg-black hover:bg-red-700 px-3 py-1 rounded text-white m-3">
                                Verificar
                            </button>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>
                       <div class="ui bottom attached tab segment h-[calc(100vh_-_200px)] overflow-y-auto" data-tab="level3">
                No momento : <span class="<?= sizeof($posts3) > 7 ? 'text-red-500' : 'text-black-500' ?>"> <?= sizeof($posts3) ?></span>/7
                <?php
                foreach ($posts3 as $post) : ?>
                    <div class="flex justify-between items-center h-auto w-full my-2 px-3 py-2 gap-x-1">
                        <img src=<?= $post["source"] == "Orbital Channel" ? "/images/$post[image]" :  $post["image"] ?> alt="" class="w-20 object-contain" />
                        <p class="w-96 title">
                            <?= $post["title"] ?>
                        </p>
                        <p class="w-auto source">
                            <?= $post["source"] ?>
                        </p>
                        <p class="w-5 section">
                            <?= $post["section"] ?>
                        </p>
                        <p class="w-24 startsAt">
                            <?= date("d-m-Y h:i ", $post["post_at"]) ?>
                        </p>
                        <p class="w-20 status">
                            <?= $post["status"] == "on" ? "Publicado" : "Fora do Ar" ?>
                        </p>
                        <input type="hidden" class="w-20 postId" value="<?= $post["id"] ?>" />
                        <input type="hidden" class="w-20 image" value="<?= $post["image"] ?>" />
                        <input type="hidden" class="w-20 postContent" value="<?= $post["content"] ?>" />
                        <div class="flex gap-x-1">
                            <button class="openModalBtn bg-black hover:bg-red-700 px-3 py-1 rounded text-white m-3">
                                Verificar
                            </button>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>
            <div class="ui bottom attached tab segment h-[calc(100vh_-_200px)] overflow-y-auto" data-tab="level4">
                No momento : <span class="<?= sizeof($posts4) > 9 ? 'text-red-500' : 'text-black-500' ?>"> <?= sizeof($posts4) ?></span>/9
                <?php
                foreach ($posts4 as $post) : ?>
                    <div class="flex justify-between items-center h-auto w-full my-2 px-3 py-2 gap-x-1">
                        <img src=<?= $post["source"] == "Orbital Channel" ? "/images/$post[image]" :  $post["image"] ?> alt="" class="w-20 object-contain" />
                        <p class="w-96 title">
                            <?= $post["title"] ?>
                        </p>
                        <p class="w-auto source">
                            <?= $post["source"] ?>
                        </p>
                        <p class="w-5 section">
                            <?= $post["section"] ?>
                        </p>
                        <p class="w-24 startsAt">
                            <?= date("d-m-Y h:i ", $post["post_at"]) ?>
                        </p>
                        <p class="w-20 status">
                            <?= $post["status"] == "on" ? "Publicado" : "Fora do Ar" ?>
                        </p>
                        <input type="hidden" class="w-20 postId" value="<?= $post["id"] ?>" />
                        <input type="hidden" class="w-20 image" value="<?= $post["image"] ?>" />
                        <input type="hidden" class="w-20 postContent" value="<?= $post["content"] ?>" />
                        <div class="flex gap-x-1">
                            <button class="openModalBtn bg-black hover:bg-red-700 px-3 py-1 rounded text-white m-3">
                                Verificar
                            </button>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>
            <div class="ui bottom attached tab segment h-[calc(100vh_-_200px)] overflow-y-auto" data-tab="automatics">

                <?php
                foreach ($autoposts as $post) : ?>
                    <div class="flex justify-between items-center h-auto w-full my-2 px-3 py-2 gap-x-1">
                        <img src=<?= $post["source"] == "Orbital Channel" ? "/images/$post[image]" : $post["image"] ?> class=" size-20 object-cover" />
                        <p class="w-96 title">
                            <?= $post["title"] ?>
                        </p>
                        <p class="w-auto source">
                            <?= $post["source"] ?>
                        </p>
                        <p class="w-5 section">
                            <?= $post["section"] ?>
                        </p>
                        <p class="w-24">
                            <?= date("d-m-Y h:i ", $post["post_at"]) ?>
                        </p>
                        <p class="w-20 status">
                            <?= $post["status"] == "on" ? "Publicado" : "Fora do Ar" ?>
                        </p>
                        <input type="hidden" class="w-20 image" value="<?= $post["image"] ?>" />
                        <input type="hidden" class="w-20 postContent" value="<?= $post["content"] ?>" />
                        <div class="flex gap-x-1">
                            <button class="openModalBtn bg-black hover:bg-red-700 px-3 py-1 rounded text-white m-3">
                                Verificar
                            </button>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>



        </div>
    </section>

    <!-- MODAL -->
    <div class="ui modal fullscreen modalArea two column grid h-fit">
        <div class="header">
            <span id="modalAreaTitle"></span>
        </div>
        <div class=" flex  justify-start gap-x-2">
            <div class="w-1/6">
                <div id="modalAreaThumb" class="w-full"></div>
            </div>
            <div class="w-5/6">
                <span>Posição:</span>
                <span id="modalAreaSection"></span>
                <div>
                    <span>Status:</span>
                    <span id="modalAreaStatus"></span>
                </div>
                <div>
                    <span>Fonte:</span>
                    <span id="modalAreaSource"></span>
                </div>

                <div id="content">
                    <span>Conteúdo:</span>
                    <span id="modalAreaContent"></span>
                </div>
            </div>
        </div>
        <div class="actions">
            <div class="flex max-[425px]:flex-col justify-end items-center p-3 gap-x-3 ">
                <button type="button" id="closeModalBtn" class="bg-red-600 hover:bg-red-700 px-3 py-1 rounded text-white mr-1 max-[425px]:mb-3">
                    Fechar
                </button>
                <div id="editPostPublish"  class="flex max-[425px]:flex-col justify-center items-center gap-x-3 max-[425px]:gap-y-3"></div>
            </div>
        </div>
    </div>
</div>
