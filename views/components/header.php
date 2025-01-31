<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=yes">
    <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
    <meta http-equiv="Pragma" content="no-cache">
    <META HTTP-EQUIV="Expires" CONTENT="-1">

    <script type="text/javascript" src="config/scripts/jquery.js"></script>
    <script src="config/scripts/tailwind.js"></script>
    <script src="config/scripts/slider.js"></script>
    <script src="config/scripts/home.js"></script>
    <!-- <script src="config/scripts/forecast.js" defer></script>
    <script src="config/scripts/coin.js"></script> -->
    <!-- <script src="config/scripts/semantic.min.js"></script> -->
    <!-- <script async defer crossorigin="anonymous" src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v20.0"
        nonce="MxGYeLoT"></script> -->

    <!-- <link rel="stylesheet" type="text/css" href="config/styles/semantic.min.css"> -->
    <!-- <link rel="stylesheet" href="config/styles/slider.css" />
    <link rel="stylesheet" href="config/styles/slick-theme.css" />
    <link rel="stylesheet" href="config/styles/slick.css" /> -->
    <!-- <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-0102587796150034"
        crossorigin="anonymous"></script>
    <script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'pt'
        }, 'google_translate_element');
    }
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
    </script> -->
    <link rel="shortcut icon" href=<?= insertAdminImage("orbital/logo.ico") ?> type="image/x-icon" />
    <title>Orbital Channel</title>
</head>


<body class="font-sans antialiased ">

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
        <div class="text-center h-[150px] w-5/6 max-[768px]:w-full  max-[768px]:bg-black">
            <?php foreach ($adsFront as $ad) : ?>
                <a href=<?= $ad['link'] ?> class="max-[768px]:hidden max-[768px]:bg-red-500">
                    <div class="relative">
                        <!-- <img src=<?= "/ads/$ad[file]" ?> alt="" class="object-cover object-center h-44 w-full"> -->
                        <img src=<?= "public/images/ads/er.png" ?> alt=""
                            class="object-scale-down object-center h-[150px] w-full">
                    </div>
                </a>
            <?php endforeach; ?>
            <?php foreach ($adsFront as $ad) : ?>
                <a href=<?= $ad['link'] ?> class="min-[768px]:hidden bg-black h-[150px]">
                    <div class="relative overflow-hidden">
                        <!-- <img src=<?= "/ads/$ad[file]" ?> alt="" class="object-cover object-center h-44 w-full"> -->
                        <img src=<?= "public/images/ads/mobile.png" ?> alt=""
                            class="object-scale-down object-center h-[150px] w-full ">
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </header>

    <?php include_once insertComponent("mobileSidebar.php") ?>