<div class="w-5/12 max-[768px]:w-full flex max-[768px]:mb-5 ">
    <div class="h-auto w-full max-[768px]:w-full flex flex-col justify-between item-center pl-3 space-y-10 ">
        <?php foreach ($level3 as $post): ?>
            <div class="flex w-full border-l-4 border-red-500 ">
                <a href=/<?= $post["slug"] ?>>
                    <p class="max-[768px]:text-[18px] text-2xl font-bold break-words text-left pl-2">
                        <?= mb_convert_case($post["title"], MB_CASE_TITLE, "UTF-8"); ?>...
                    </p>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>