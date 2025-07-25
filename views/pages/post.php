<?php
// var_dump($content);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta http-equiv="Contnt-Type" content="text/html" ; charset="UTF-8" />
    <title>Orbital Channel</title>
    <meta name="description" content="Orbital Tv">
    <meta name="keywords" content="<?= $keywords ?>">
    <meta name="author" content="<?= $author ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
    <meta http-equiv="Pragma" content="no-cache">
    <META HTTP-EQUIV="Expires" CONTENT="-1">

    <script type="text/javascript" src=<?= insertScript("jquery.js") ?>></script>
    <script type="text/javascript" src=<?= insertScript("tailwind.js") ?>></script>
    <script type="text/javascript" src=<?= insertScript("postnews.js") ?>></script>
    <script type="text/javascript" src=<?= insertScript("coin.js") ?> defer></script>
    <script type="text/javascript" src=<?= insertScript("forecast") ?> defer></script>

    <!-- <script src="/scripts/coin.js" defer></script> -->
    <!-- <script src="/scripts/forecast.js" defer></script> -->

    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-0102587796150034"
        crossorigin="anonymous"></script>

    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'pt'
            }, 'google_translate_element');
        }
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
    </script>
    <link rel="shortcut icon" href=<?= insertAdminImage("orbital/logo.ico") ?> type="image/x-icon" />
</head>

<body class="m-auto p-auto">
    <header
        class="w-full flex max-[768px]:flex-col-reverse justify-between items-center  h-52 max-[768px]:h-auto py-3 p-6 max-[768px]:p-0 max-[768px]:border-0 border-4 border-transparent border-b-black">
        <div
            class="w-1/6 max-[768px]:w-full flex justify-center max-[768px]:justify-start  h-full max-[768px]:items-center max-[768px]:bg-amber-950  ">
            <button id="openMenuMobile" class="min-[768px]:hidden">
                <img src=<?= insertAdminImage("icons/menuWhite.svg") ?> class="size-7 mr-5" />
            </button>
            <a href="/">
                <img src="public/images/orbital/logo.png" alt="logo"
                    class="h-full focus:outline-none max-[768px]:size-12 mb-3 " />
            </a>
            <h1 class="min-[768px]:hidden text-white text-2xl font-bold ml-5">Orbital Channel</h1>
        </div>

    </header>
    <div class="hidden max-[768px]:flex ">
        <div id="forecast" class="w-1/2 text-center h-10">111</div>
        <div id="stock" class="w-1/2 h-10 text-center"></div>
    </div>
    <main class="min-[768px]:max-w-screen-2xl mx-auto">
        <div class="flex max-[768px]:flex-col justify-between my-2 h-full">
            <div class="w-2/12"></div>
            <div class="w-7/12 max-[768px]:w-full flex flex-col px-5 h-auto">
                <div id="shortArticleFront">
                    <div class="flex justify-center">
                        <h1 class="w-full text-left text-xl">De: <?= $content["authorName"] ?></h1>
                    </div>
                    <h1 class="w-full text-center text-3xl font-bold mb-2"><?= $content["title"] ?></h1>
                    <div class="flex justify-end gap-x-6 py-5">
                        <div class="fb-share-button" data-href="https://orbitaltv.net/<?= $content["slug"] ?>"
                            data-layout="" data-size=""><a target="_blank"
                                href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse"
                                class="fb-xfbml-parse-ignore">Share</a>
                        </div>
                        <a href="https://orbitaltv.net/<?= $content["slug"] ?>" class="twitter-share-button"
                            data-show-count="false"><img src=<?= insertImage("icons/x.png") ?> class=" w-14" />
                        </a>
                        <a href="https://api.whatsapp.com/send?text=https://orbitaltv.net/<?= $content["slug"] ?>"
                            target="_blank">
                            <img src=<?= insertImage("icons/whats.png") ?> class=" w-9" />
                        </a>
                        <a href="mailto:email@address.com?subject=<body><a href='https://api.whatsapp.com/send?text=https://orbitaltv.net/<?= $content["slug"] ?>'>Link da Matéria </a>
            </body>"><img src=<?= insertImage("icons/email.jpg") ?> class="w-9" /></a>
                        <a href="https://t.me/share/url?url=https://api.whatsapp.com/send?text=https://orbitaltv.net/<?= $content["slug"] ?>"
                            target="_blank"><img src=<?= insertImage("icons/telegram.png") ?> class="w-9" /></a>
                    </div>
                    <img src=<?= insertAdminImage($content["image"]) ?> />
                    <div id="textToSpeechBtFront" class="mt-2 text-center">
                        <button id="pauseFront">
                            <img src=<?= insertImage("icons/pause.png") ?> class="w-10" />
                        </button>
                        <button id="resumeFront">
                            <img src=<?= insertImage("icons/play.png") ?> class="w-10" />
                        </button>
                        <button id="stopFront">
                            <img src=<?= insertImage("icons/stop.png") ?> class="w-10" />
                        </button>
                        <button id="playFront"><img src=<?= insertImage("icons/play.png") ?> /></button>
                    </div>
                    <div id="textToSpeechFront" class="mt-3 px-5 text-justify">
                        <?= $content["content"] ?>
                    </div>
                </div>
            </div>
            <div class="w-3/12 max-[768px]:w-full">
                <span class="font-bold text-2xl">Mais Posts</span>
                <?php foreach ($morePosts as $post) : ?>
                    <div class="mb-7">
                        <a href=<?= $post["slug"] ?>>
                            <img src=<?= insertImage($post["image"]) ?>
                                class="w-full h-[300px] object-cover object-center" />
                        </a>
                        <p class="text-2xl text-center font-bold mt-1 mx-3"><?= $post["title"] ?></p>
                    </div>
                <?php endforeach; ?>
            </div>


        </div>
    </main>
    <?php
    include insertComponent("footer.php");
    ?>