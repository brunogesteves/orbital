<?php
include insertComponent("admin/header.php");

?>
<div id="size"></div>
<div class="mx-auto mt-2 flex">
    <?php
    include insertComponent("admin/sidebar.php");
    ?>
    <main class="w-full max-[768px]:w-full">
        <div class="flex w-full rounded shadow max-[768px]:hidden">
            <button aria-current="page" onclick="showTab('top')"
                class="tab-button w-full flex justify-center font-medium rounded-l px-5 py-2 border bg-white text-gray-800 border-gray-200 rounded hover:bg-red-200">
                Top
            </button>
            <button aria-current="false" onclick="showTab('mobile')"
                class="tab-button w-full flex justify-center font-medium rounded-l px-5 py-2 border bg-white text-gray-800 border-gray-200 rounded hover:bg-red-200">
                Mobile
            </button>
            <button aria-current="false" onclick="showTab('news')"
                class="tab-button w-full flex justify-center font-medium rounded-l px-5 py-2 border bg-white text-gray-800 border-gray-200 rounded hover:bg-red-200">
                News
            </button>
        </div>
        <select id="tabSelect" class="flex w-full rounded shadow min-[768px]:hidden mb-3">
            <option value="top"> Nível 1 </option>
            <option value="mobile"> Nível 2 </option>
            <option value="news"> Nível 3 </option>
        </select>
        <!-- Tab Content -->
        <div id="top" class=" tab-content bg-white shadow-md rounded-lg h-[calc(100vh_-_303px)] overflow-y-auto">
            <?php include_once insertComponent("admin/ads/level1.php") ?>
        </div>
        <div id="mobile"
            class=" tab-content bg-white shadow-md rounded-lg hidden h-[calc(100vh_-_303px)] overflow-y-auto">
            <?php include_once insertComponent("admin/ads/level2.php") ?>

        </div>
        <div id="news"
            class=" tab-content bg-white shadow-md rounded-lg hidden h-[calc(100vh_-_303px)] overflow-y-auto">
            <?php include_once insertComponent("admin/ads/level3.php") ?>

        </div>
    </main>
</div>

<?php
include insertComponent("admin/footer.php");
?>
<script src=<?= insertComponent("ads.js") ?> defer></script>