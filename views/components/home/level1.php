<div class=" max-[767px]:w-full w-1/2  h-full ">
    <div class="flex justify-between items-start max-[768px]:flex-col h-1/2">
        <a href="<?= $level1[0]["slug"] ?>" class="flex flex-col w-full">
            <div class="w-full max-[767px]:w-full h-full px-2 pt-0">
                <img src=<?= insertImage($level1[0]["image"]) ?>
                    class="h-[232px] w-[369px] max-[768px]:h-[232px] max-[768px]:w-full" />
            </div>
            <div class="h-14 px-2">
                <span class="font-semibold"><?= $level1[0]["title"] ?></span>
            </div>
        </a>
        <a href="<?= $level1[1]["slug"] ?>" class="flex flex-col w-full">
            <div class="w-full max-[767px]:w-full h-full px-2 pt-0">
                <img src=<?= insertImage($level1[1]["image"]) ?>
                    class="h-[232px] w-[369px] max-[768px]:h-[232px] max-[768px]:w-full" />
            </div>
            <div class="h-14 px-2">
                <span class="font-semibold"><?= $level1[1]["title"] ?></span>
            </div>
        </a>
    </div>
    <div class="flex justify-between items-start max-[768px]:flex-col h-1/2">
        <a href="<?= $level1[2]["slug"] ?>" class="flex flex-col w-full">
            <div href="#" class="w-full max-[767px]:w-full h-full px-2 pt-0">
                <img src=<?= insertImage($level1[2]["image"]) ?>
                    class="h-[232px] w-[369px] max-[768px]:h-[232px] max-[768px]:w-full" />
            </div>
            <div class="h-14 px-2">
                <span class="font-semibold"><?= $level1[2]["title"] ?></span>
            </div>
        </a>
        <a href="<?= $level1[3]["slug"] ?>" class="flex flex-col w-full">
            <div class="w-full max-[767px]:w-full h-full px-2 pt-0">
                <img src=<?= insertImage($level1[3]["image"]) ?>
                    class="h-[232px] w-[369px] max-[768px]:h-[232px] max-[768px]:w-full" />
            </div>
            <div class="h-14 px-2">
                <span class="font-semibold"><?= $level1[3]["title"] ?></span>
            </div>
        </a>
    </div>

</div>