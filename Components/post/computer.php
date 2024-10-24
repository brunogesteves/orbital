<header class="w-full flex justify-center items-center h-52 py-3 gap-3 mr-6  ">
    <div class="w-1/6 flex justify-center h-full">
        <a href="/"><img src="/images/orbital/logo.png" alt="logo" class="h-full" /></a>
    </div>
    <div id="sliderAdsHeaderPostFront" class="text-center h-44 w-5/6 ">
        <?php foreach ($adsPostFront as $post) : ?>
            <a href=<?= $post["slug"] ?>>
                <img src=<?= "/images/ads/$post[file]" ?> alt="" class="object-cover object-center h-44 w-full">
            </a>
        <?php endforeach; ?>
    </div>
</header>
<hr class="border-b-2  mb-2 mx-6 border-black w-full">
<main class="w-screen h-full mb-10 px-6">
    <div class="flex justify-between my-2 h-full">
        <div class="w-3/12"></div>
        <div class="w-6/12 flex flex-col px-5">
            <div id="shortArticleFront">
                <!-- <div class="flex justify-center">
                    <h1 class="w-full text-left text-xl">De: <?= $content["authorName"] ?></h1>
                </div> -->
                <h1 class="w-full text-center text-3xl font-bold mb-2"><?= $content["title"] ?></h1>
                <div class="flex justify-end gap-x-6 py-5">
                    <div class="fb-share-button" data-href="https://orbitaltv.net/<?= $content["slug"] ?>" data-layout="" data-size=""><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a>
                    </div>
                    <a href="https://orbitaltv.net/<?= $content["slug"] ?>" class="twitter-share-button" data-show-count="false"><img src="/images/icons/x.png" class="w-14" />
                    </a>
                    <a href="https://api.whatsapp.com/send?text=https://orbitaltv.net/<?= $content["slug"] ?>" target="_blank">
                        <img src="/images/icons/whats.png" class="w-9" />
                    </a>
                    <a href="mailto:email@address.com?subject=<body><a href='https://api.whatsapp.com/send?text=https://orbitaltv.net/<?= $content["slug"] ?>'>Link da Matéria </a>
            </body>"><img src="/images/icons/email.jpg" class="w-9" /></a>
                    <a href="https://t.me/share/url?url=https://api.whatsapp.com/send?text=https://orbitaltv.net/<?= $content["slug"] ?>" target="_blank"><img src="/images/icons/telegram.png" class="w-9" /></a>
                    <!-- <a href="mailto:someone@example.com"><img src="/images/icons/threads.png" class="w-9" /></a> -->
                </div>
                <div class="flex justify-center">
                    <img src=<?= $content["source"] == "Orbital Channel" ? "images/$content[image]" : (strlen($content["image"]) <= 0 ? 'images/logo.jpg' : $content["image"]) ?> alt="" class="w-96  self-center">
                </div>
                <div id="textToSpeechBtFront" class="mt-2 text-center">
                    <button type="button" id="pauseFront" class="cursor-pointer bg-black text-white p-3">
                        Pausar
                    </button>
                    <button type="button" id="resumeFront" class="cursor-pointer bg-black text-white p-3">
                        Retomar
                    </button>
                    <button type="button" id="stopFront" class=" cursor-pointer bg-black text-white p-3">
                        Parar
                    </button>
                    <input type="submit" id="playFront" value="Escutar matéria" class="cursor-pointer bg-black text-white p-3" />
                </div>
                <div id="textToSpeechFront" class="mt-3 px-5 text-justify">
                    <?= $content["content"] ?>
                </div>
                <div>
                    <p class="text-center text-[18px] my-4 font-bold ">Fonte: <?= $content["source"] ?></p>
                </div>
            </div>
            <?php if ($content["source"] !== "Orbital Channel") : ?>
                <div class="flex justify-center mt-5">
                    <button id="showCompleteArticleBtnFront" class="cursor-pointer bg-black text-white p-3">Ler Matéria Completa</button>
                </div>
            <?php endif; ?>
            <div id="completeArticleFront" class="h-full">
                <iframe height="100%" width="100%" frameborder="0" src=<?= $content["link"] ?>></iframe>
            </div>
        </div>
        <div class="w-3/12">
            <span class="font-bold text-2xl">Mais Posts</span>
            <?php foreach ($morePosts as $post) : ?>
                <div class="mb-7">
                    <a href=<?= $post["slug"] ?>>
                        <img src="/images/<?= $post["image"] ?>" class="w-full h-44" />
                    </a>
                    <p class="text-2xl font-bold mt-1 mx-3"><?= $post["title"] ?></p>
                </div>
            <?php endforeach; ?>
        </div>


    </div>
</main>
<footer class="w-full bg-black text-white flex flex-col justify-center items-center  py-3 -mb-4">
    <img src="images/orbital/logo.png" alt="logo" class="rounded-full w-10" />
    <span> Orbital Channel - Direitos Reservados</span>
</footer>