<div class="ui thin sidebar inverted vertical menu">
    <a class="item">
        PodCast da Rafa mobile
    </a>
    <a class="item">
        PodCast da Rafa
    </a>
    <a class="item">
        PodCast da Rafa
    </a>
</div>
<header class="bg-[#251014] w-full">
    <div id="sliderAdsHeaderMobile" class="h-[100px] w-full">
        <?php foreach ($adsMobile as $post) : ?>
            <a href=<?= $post["link"] ?>>
                <img src=<?= "/images/ads/$post[file]" ?> alt="" class="object-cover object-center w-full">
            </a>
        <?php endforeach; ?>
    </div>
    <div class="flex justify-start items-center py-3 pl-5  gap-x-3 w-full">
        <img src="/images/icons/menuWhite.svg" alt="logo" class="rounded-full mt-3 mt-1 w-7 h-7" id="menu_mobile_open" />
        <a href="/"> <img src="/images/orbital/logo.png" alt="logo" class="rounded-full -mt-2 w-16 h-16 object-center" /></a>
        <div class="mt-2">
            <a href="/"> <span class="text-white text-2xl font-black font-sans">ORBITAL CHANNEL</span></a>
        </div>
    </div>
</header>
<div class="w-full h-20 flex justify-evenly items-center shadow-lg font-bold px-5">
    <div class="flex flex-col w-6/12" id="stockHomeMobile">Carregando..</div>
    <div id="grad1" class="1/12"></div>
    <div id="foreCastHomeMobile" class="w-6/12">Carregando..</div>
</div>
<div class="flex flex-col m-5">
    <?php foreach ($posts1 as $post) : ?>
        <div class="w-full my-1 ">
            <a href=/<?= $post["slug"] ?> class="flex">
                <span class="border-l-4 pl-1 border-red-500 h-7"></span>
                <p class="text-[18px] font-extrabold text-left"><?= $post["title"] ?></p>
            </a>
        </div>
    <?php endforeach; ?>
</div>
<div class="w-full h-[300px] relative mb-6 overflow-hidden">
    <div class="sliderMobile text-center text-white w-full">
        <?php foreach ($posts2 as $post) : ?>
            <a href=/<?= $post["slug"] ?>>
                <div class="bg-black w-full relative">
                    <img src=<?= $post["source"] == "Orbital Channel" ? "/images/$post[image]" :  $post["image"] ?> alt="" class=" w-full h-[300px]  opacity-60">
                    <div class="absolute text-center w-full font-bold text-white text-2xl px-10 bottom-0 headlineMobile">
                        <?= $post["title"] ?></div>
                    <?= mb_convert_case($post["title"], MB_CASE_TITLE, "UTF-8");; ?>...
                </div>
            </a>
        <?php endforeach; ?>
    </div>
</div>
<?php foreach ($posts3 as $post) : ?>
    <div class=" h-auto px-5 my-1 h-[100px]">
        <a href=/<?= $post["slug"] ?> class="flex gap-x-2 w-full h-full">
            <div class="w-5/12  h-full">
                <img src=<?= $post["source"] == "Orbital Channel" ? "/images/$post[image]" :  $post["image"] ?> alt="" class="object-fill w-full h-[100px]" />
            </div>
            <div class="w-7/12">
                <p class="text-[18px] font-extrabold text-left">
                    <?= mb_convert_case(substr($post["title"], 0, 55), MB_CASE_TITLE, "UTF-8");; ?>...
                </p>
            </div>
        </a>
    </div>
<?php endforeach; ?>
<?php foreach ($posts4 as $post) : ?>
    <div class=" h-auto px-5 my-1 h-[100px]">
        <a href=/<?= $post["slug"] ?> class="flex gap-x-2 w-full h-[100px]">
            <div class="w-5/12  h-full">
                <img src=<?= $post["source"] == "Orbital Channel" ? "/images/$post[image]" :  $post["image"] ?> alt="" class="object-fill w-full h-full" />
            </div>
            <div class="w-7/12">
                <p class="text-[18px] font-extrabold text-left">
                    <?= mb_convert_case(substr($post["title"], 0, 55), MB_CASE_TITLE, "UTF-8");; ?>...
                </p>
            </div>
        </a>
    </div>
<?php endforeach; ?>
<footer class="w-full bg-black text-white flex flex-col justify-center items-center  py-3 -mb-4">
    <img src="images/orbital/logo.png" alt="logo" class="rounded-full w-10" />

    <span> Orbital Channel - Direitos Reservados</span>
</footer>