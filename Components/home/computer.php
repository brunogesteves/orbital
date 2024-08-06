<header class="w-full flex justify-between items-center h-52 py-3 p-6">
    <div class="w-1/6 flex justify-center h-full ">
        <a href="/"><img src="/images/orbital/logo.png" alt="logo" class="h-full" /></a>
    </div>
    <div class="sliderHeaderFront text-center h-44 w-5/6 ">
        <?php foreach ($adsFront as $post) : ?>
            <a href=<?= $post["slug"] ?>>
                <div class="relative">
                    <img src=<?= "/images/ads/$post[file]" ?> alt="" class="object-cover object-center h-44 w-full">
                </div>
            </a>
        <?php endforeach; ?>
    </div>
</header>
<div class="border-b-4 mb-5 border-black h-5 w-full mx-6"></div>
<div class="flex items-start w-full gap-x-2 h-auto px-6">
    <div class="w-1/4 flex flex-wrap justify-around  gap-y-2 w-full">
        <?php foreach ($posts1 as $post) : ?>
            <div class=" flex flex-col w-1/2 justify-start items-start overflow-hidden px-1">
                <a href=/<?= $post["slug"] ?>>
                    <img src=<?= $post["source"] == "Orbital Channel" ? "/images/$post[image]" :  $post["image"] ?> alt="" class="object-cover object-center h-64 w-full" />
                    <span class="text-[18px] font-bold break-words text-left">
                        <?= mb_convert_case(substr($post["title"], 0, 62), MB_CASE_TITLE, "UTF-8");; ?>...

                    </span>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="w-3/4 relative overflow-hidden flex flex-col">
        <div class="sliderArea w-full h-full relative cursor-pointer mb-6 h-96">
            <div id="previewImg" class="hidden bg-slate-500 hover:bg-slate-300 z-10 absolute top-1/2 left-0 rounded-l-md cursor-pointer p-3 rotate-180">
                <img src="/images/icons/arrow-right.png" width="20" />
            </div>
            <div id="nextImg" class="hidden max-sm:invisible bg-slate-500 hover:bg-slate-300 z-10 absolute top-1/2 right-0 rounded-l-md cursor-pointer p-3 rotate-0">
                <img src="/images/icons/arrow-right.png" width="20" class="" />
            </div>
            <div class="sliderFront text-center text-white w-full">
                <?php foreach ($posts2 as $post) : ?>
                    <a href=<?= $post["slug"] ?>>
                        <div class="relative">
                            <img src=<?= $post["source"] == "Orbital Channel" ? "/images/$post[image]" :  $post["image"] ?> alt="" class="object-cover object-top h-96 w-full">
                            <span class="absolute text-center w-full font-bold text-white text-2xl left-0 bottom-0 headline">
                                <?= mb_convert_case(substr($post["title"], 0, 62), MB_CASE_TITLE, "UTF-8");; ?>...
                            </span>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="sliderAdSlide text-center h-56 text-white w-full">
            <?php foreach ($adsSlide as $post) : ?>
                <a href=<?= $post["slug"] ?>>
                    <div class="relative">
                        <img src=<?= "images/ads/$post[file]" ?> alt="" class="object-cover object-center h-56  w-full">
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<div class="flex justify-between mt-2 w-full">
    <div class="w-5/12 flex flex-col justify-between item-start pb-5 pl-7">
        <?php foreach ($posts3 as $post) : ?>
            <div class="flex w-full my-5 border-l-4 border-red-500 h-7">
                <a href=/<?= $post["slug"] ?>>
                    <p class="text-[18px] font-bold break-words text-left pl-2">
                        <?= mb_convert_case($post["title"], MB_CASE_TITLE, "UTF-8");; ?>...
                    </p>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="w-7/12 flex flex-wrap bg-slate-400 items-start gap-y-6 m-auto pb-7">
        <?php foreach ($posts4 as $post) : ?>
            <div class="h-56 flex flex-col items-center w-1/3 px-3 overflow-hidden">
                <a href=/<?= $post["slug"] ?> class="w-full h-full">
                    <img src=<?= $post["source"] == "Orbital Channel" ? "/images/$post[image]" :  $post["image"] ?> alt="" class="h-3/4 w-full" />
                    <span class="text-[18px] font-bold break-words text-left">
                        <?= mb_convert_case(substr($post["title"], 0, 62), MB_CASE_TITLE, "UTF-8");; ?>...
                    </span>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<footer class="w-full bg-black text-white flex flex-col justify-center items-center  py-3 -mb-4">
    <img src="images/orbital/logo.png" alt="logo" class="rounded-full w-10" />

    <span> Orbital Channel - Direitos Reservados</span>
</footer>