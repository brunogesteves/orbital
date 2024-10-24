<header class="bg-[#251014] w-full">
    <div id="sliderAdsHeaderPostMobile" class="h-[100px] w-full -mt-5">
        <?php foreach ($adsPostMobile as $post) : ?>
            <a href=<?= $post["link"] ?>>
                <img src=<?= "/images/ads/$post[file]" ?> alt="" class="object-cover object-center w-full">
            </a>
        <?php endforeach; ?>
    </div>
    <div class="flex justify-start items-center px-5 pb-3 gap-x-3 w-full">
        <img src="/images/icons/menuWhite.svg" alt="logo" class="rounded-full mt-3 mt-1 w-7 h-7" id="menu_mobile_open" />
        <a href="/"> <img src="/images/orbital/logo.png" alt="logo" class="rounded-full -mt-2 w-16 h-16 object-center" /></a>
        <div class="mt-2">
            <a href="/"> <span class="text-white text-2xl font-black font-sans">ORBITAL CHANNEL</span></a>
        </div>
    </div>
</header>
<div class="w-full h-20 flex justify-evenly items-center shadow-lg font-bold px-5">
    <div class="flex flex-col w-6/12" id="stockPostMobile">Carregando..</div>
    <div id="grad1" class="1/12"></div>
    <div id="foreCastPostMobile" class="w-6/12">Carregando..</div>
</div>

<main class="h-auto w-12/12 px-4 h-[calc(100vh_-_272px)]">
    <div id="shortArticleMobile">
        <!-- <div class="flex justify-center">
            <h1 class="w-full text-left text-xl mt-3">De: <?= $content["authorName"] ?></h1>
        </div> -->
        <h1 class="w-full text-center text-[28px] font-bold mb-2 leading-10">
            <?= $content["title"] ?></h1>
        <div class="flex gap-y-7 justify-end items-center gap-x-7 p-2 rounded-md max-sm:justify-center max-sm:my-5">
            <div class="fb-share-button" data-href="https://orbitaltv.net/<?= $content["slug"] ?>" data-layout="" data-size=""><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
            <a href="https://orbitaltv.net/<?= $content["slug"] ?>" class="twitter-share-button" data-show-count="false">
                <img src="/images/icons/x.png" class="w-14" />
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
            <img src=<?= $content["source"] == "Orbital Channel" ? "/images/$content[image]" : (strlen($content["image"]) <= 0 ? '/images/logo.jpg' : $content["image"]) ?> alt=<?= $content["title"] ?> class="w-[652px] h-[419px] h-auto self-center" />
        </div>

        <div id="textToSpeechBtnMobile" class="mt-2 text-center">
            <button type="button" id="pauseMobile" class="cursor-pointer bg-black text-white p-3">
                Pausar
            </button>
            <button type="button" id="resumeMobile" class="cursor-pointer bg-black text-white p-3">
                Retomar
            </button>
            <button type="button" id="stopMobile" class="cursor-pointer bg-black text-white p-3">
                Parar
            </button>
            <input type="submit" id="playMobile" value="Escutar matéria" class="cursor-pointer bg-black text-white p-3" />
        </div>
        <div id="textToSpeechMobile" class="mt-3 text-[18px] text-justify px-4">
            <?= $content["content"] ?>
        </div>
        <div class="flex flex-col w-full  max-sm:justify-center mb-3  items-center">
            <p class="text-start text-[18px] my-4 font-bold max-sm:pl-2">Fonte: <?= $content["source"] ?></p>
        </div>
    </div>
    <?php if ($content["source"] !== "Orbital Channel") : ?>
        <div class="flex justify-center mt-5">
            <button id="showCompleteArticleBtnMobile" class="cursor-pointer bg-black text-white p-3">Ler Matéria Completa</button>
        </div>
    <?php endif; ?>
    <div id="completeArticleMobile" class="h-[calc(100vh_-_276px)]">
        <iframe height="100%" width="100%" frameborder="0" src=<?= $content["link"] ?>></iframe>
    </div>
    <div class="flex flex-col gap-y-5 text-center morePosts">
        <span class="font-bold text-2xl">Mais Posts</span>
        <?php foreach ($morePosts as $post) : ?>
            <div class="mb-5">
                <a href=<?= $post["slug"] ?>>
                    <img src="/images/<?= $post["image"] ?>" />
                </a>
                <p class="text-[18px] font-bold mt-1 "><?= $post["title"] ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</main>
<footer class="w-full bg-black text-white flex flex-col justify-center items-center  py-3 -mb-4">
    <img src="images/orbital/logo.png" alt="logo" class="rounded-full w-10" />
    <span> Orbital Channel - Direitos Reservados</span>
</footer>