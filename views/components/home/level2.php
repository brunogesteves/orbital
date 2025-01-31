<div class="w-1/2 max-[768px]:w-full h-[566px] max-[768px]:h-[232px] overflow-hidden relative">
    <div id="slide" class="w-full h-full flex justify-self-stretch  transition ease-out duration-200">
        <?php foreach ($level2 as $post): ?>
            <a href="<?= $post["slug"] ?>" class="w-full h-full flex-none ">
                <img src=<?= insertImage($post["image"]) ?> alt="<?= $post["title"] ?>" class="w-full h-full " />
                <div
                    class="w-full flex justify-center items-center  absolute bottom-0 bg-gradient-to-b from-transparent via-black via-20% via-black via-80% to-black  h-20">
                    <span class="text-white"><?= $post["title"] ?></span>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
    <button type="button" id="nextSlide" class="bg-gray-500 rounded-lg p-6 absolute top-1/2 left-0 max-[768px]:hidden">
        <img src=<?= insertImage("icons/arrow-right.png") ?> alt="arrow" class="size-6" />
    </button>
    <button type="button" id="previousSlide"
        class="bg-gray-500 rounded-lg p-6 absolute top-1/2 right-0 max-[768px]:hidden">
        <img src=<?= insertImage("icons/arrow-right.png") ?> alt="arrow" class="size-6 rotate-180" />
    </button>
</div>