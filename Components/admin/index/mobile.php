    <section class="w-full ">
        <select class="selectTab w-full py-5 rounded-lg border-2 border-black">
            <option value="mobilePosts">Orbital</option>
            <option value="mobileN1">Nível 1</option>
            <option value="mobileN2">Nível 2</option>
            <option value="mobileN3">Nível 3</option>
            <option value="mobileN4">Nível 4</option>
        </select>
        <div id="mobilePosts" class="h-full">
            <div class="w-full flex justify-center my-5">
                Filtar por:
                <select id="authorSelectMobile">
                    <option>Escolha um usuário</option>
                    <?php
                    foreach ($users as $user): ?>
                        <option><?= ucwords($user["name"]) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <?php
            foreach ($posts as $post) : ?>
                <div class="mobilePostsArea flex flex-col justify-between items-center h-auto w-full my-2 gap-y-2 px-3 py-2">
                    <img src="/images/<?= $post['image'] ?>" class=" w-full object-contain" />
                    <p class="w-96 title font-bold text-2xl">
                        <?= $post["title"] ?>
                    </p>
                    <p class="w-auto source">
                        <?= $post["source"] ?>
                    </p>
                    <p class="w-auto nameAuthor">
                        <?= ucwords($post["authorName"]) ?>
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
                    <input type="hidden" class="w-20 postContent" value="<?= htmlentities($post["content"]) ?>" />
                    <div class="flex gap-x-1">
                        <button class="openModalBtn bg-black hover:bg-red-700 px-5 py-3 rounded text-white m-3">
                            Verificar
                        </button>
                        <form method="POST" action="admin/destroy" class="flex items-center">
                            <input type="hidden" name="deletePostId" value=<?= $post["id"] ?> />
                            <button type="submit" class="rounded-md" name="_method" value="DELETE">
                                <img src="images/icons/trash.png" alt="trash" class="ml-5 w-12" />
                            </button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div id="mobileN1" class="h-full hidden">
            No momento : <span class="<?= sizeof($posts1) > 4  ? 'text-red-500' : 'text-black-500' ?>"> <?= sizeof($posts1) ?></span>/4
            <?php
            foreach ($posts1 as $post) : ?>
                <div class="flex flex-col justify-between items-center h-auto w-full my-2 gap-y-2 px-3 py-2">
                    <img src=<?= $post["source"] == "Orbital Channel" ? "/images/$post[image]" :  $post["image"] ?> class="w-full object-contain" />
                    <p class="w-96 title font-bold text-2xl">
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
                    <input type="hidden" class="w-20 postContent" value="<?= htmlentities($post["content"]) ?>" />
                    <div class="flex gap-x-1">
                        <button class="openModalBtn bg-black hover:bg-red-700 px-5 py-3 rounded text-white m-3">
                            Verificar
                        </button>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
        <div id="mobileN2" class="h-full hidden">
            No momento : <span class="<?= sizeof($posts2) > 4  ? 'text-red-500' : 'text-black-500' ?>"> <?= sizeof($posts2) ?></span>/4
            <?php
            foreach ($posts2 as $post) : ?>
                <div class="flex flex-col justify-between items-center h-auto w-full my-2 gap-y-2 px-3 py-2">
                    <img src=<?= $post["source"] == "Orbital Channel" ? "/images/$post[image]" :  $post["image"] ?> class="w-full object-contain" />
                    <p class="w-96 title font-bold text-2xl">
                        <?= $post["title"] ?>
                    </p>
                    <p class="w-auto source">
                        <?= $post["source"] ?>
                    </p>
                    <p class="w-5 section">
                        <?= $post["section"] ?>
                    </p>
                    <p class="w-auto nameAuthor">
                        <?= ucwords($post["authorName"]) ?>
                    </p>
                    <p class="w-24 startsAt">
                        <?= date("d-m-Y h:i ", $post["post_at"]) ?>
                    </p>
                    <p class="w-20 status">
                        <?= $post["status"] == "on" ? "Publicado" : "Fora do Ar" ?>
                    </p>
                    <input type="hidden" class="w-20 postId" value="<?= $post["id"] ?>" />
                    <input type="hidden" class="w-20 image" value="<?= $post["image"] ?>" />
                    <input type="hidden" class="w-20 postContent" value="<?= htmlentities($post["content"]) ?>" />
                    <div class="flex gap-x-1">
                        <button class="openModalBtn bg-black hover:bg-red-700 px-5 py-3 rounded text-white m-3">
                            Verificar
                        </button>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
        <div id="mobileN3" class="h-full hidden">
            No momento : <span class="<?= sizeof($posts3) > 8 ? 'text-red-500' : 'text-black-500' ?>"> <?= sizeof($posts3) ?></span>/7
            <?php
            foreach ($posts3 as $post) : ?>
                <div class="flex flex-col justify-between items-center h-auto w-full my-2 gap-y-2 px-3 py-2">
                    <img src=<?= $post["source"] == "Orbital Channel" ? "/images/$post[image]" :  $post["image"] ?> class="w-full object-contain" />
                    <p class="w-96 title font-bold text-2xl">
                        <?= $post["title"] ?>
                    </p>
                    <p class="w-auto source">
                        <?= $post["source"] ?>
                    </p>
                    <p class="w-5 section">
                        <?= $post["section"] ?>
                    </p>
                    <p class="w-auto nameAuthor">
                        <?= ucwords($post["authorName"]) ?>
                    </p>
                    <p class="w-24 startsAt">
                        <?= date("d-m-Y h:i ", $post["post_at"]) ?>
                    </p>
                    <p class="w-20 status">
                        <?= $post["status"] == "on" ? "Publicado" : "Fora do Ar" ?>
                    </p>
                    <input type="hidden" class="w-20 postId" value="<?= $post["id"] ?>" />
                    <input type="hidden" class="w-20 image" value="<?= $post["image"] ?>" />
                    <input type="hidden" class="w-20 postContent" value="<?= htmlentities($post["content"]) ?>" />
                    <div class="flex gap-x-1">
                        <button class="openModalBtn bg-black hover:bg-red-700 px-5 py-3 rounded text-white m-3">
                            Verificar
                        </button>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
        <div id="mobileN4" class="h-full hidden">
            No momento : <span class="<?= sizeof($posts4) > 9 ? 'text-red-500' : 'text-black-500' ?>"> <?= sizeof($posts4) ?></span>/9
            <?php
            foreach ($posts4 as $post) : ?>
                <div class="flex flex-col justify-between items-center h-auto w-full my-2 gap-y-2 px-3 py-2">
                    <img src=<?= $post["source"] == "Orbital Channel" ? "/images/$post[image]" :  $post["image"] ?> alt="" class="w-full object-contain" />
                    <p class="w-96 title font-bold text-2xl">
                        <?= $post["title"] ?>
                    </p>
                    <p class="w-auto source">
                        <?= $post["source"] ?>
                    </p>
                    <p class="w-5 section">
                        <?= $post["section"] ?>
                    </p>
                    <p class="w-auto nameAuthor">
                        <?= ucwords($post["authorName"]) ?>
                    </p>
                    <p class="w-24 startsAt">
                        <?= date("d-m-Y h:i ", $post["post_at"]) ?>
                    </p>
                    <p class="w-20 status">
                        <?= $post["status"] == "on" ? "Publicado" : "Fora do Ar" ?>
                    </p>
                    <input type="hidden" class="w-20 postId" value="<?= $post["id"] ?>" />
                    <input type="hidden" class="w-20 image" value="<?= $post["image"] ?>" />
                    <input type="hidden" class="w-20 postContent" value="<?= htmlentities($post["content"]) ?>" />
                    <div class="flex gap-x-1">
                        <button class="openModalBtn bg-black hover:bg-red-700 px-5 py-3 rounded text-white m-3">
                            Verificar
                        </button>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </section>