<div
    class="w-7/12 max-[767px]:w-full flex flex-wrap max-[767px]:flex-col items-start gap-y-1 m-auto min-[768px]:bg-gray-500">
    <?php foreach ($level4 as $post) : ?>
        <a href=/<?= $post["slug"] ?>
            class="  w-1/3 max-[767px]:w-full flex justify-start items-start  min-[768px]:flex-col min-[768px]:px-1">
            <img src=<?= insertImage($post["image"]) ?> alt=""
                class="w-[369px] max-[768px]:w-1/2 h-[232px]  max-[768px]:h-4/6" />
            <div class="h-14 w-full ">
                <span class="text-[18px] text-white font-bold break-words text-left w-1/2 max-[768px]:pl-3">
                    <?= mb_convert_case(substr($post["title"], 0, 62), MB_CASE_TITLE, "UTF-8"); ?>
                </span>
            </div>
        </a>


    <?php endforeach; ?>
</div>