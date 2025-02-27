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
            <button aria-current="false" onclick="showTab('tab5')"
                class="tab-button w-full flex justify-center font-medium rounded-l px-5 py-2 border bg-white text-gray-800 border-gray-200 rounded hover:bg-red-200">
                Todo os posts
            </button>
            <button aria-current="page" onclick="showTab('tab1')"
                class="tab-button w-full flex justify-center font-medium rounded-l px-5 py-2 border bg-white text-gray-800 border-gray-200 rounded hover:bg-red-200">
                Nível 1
            </button>
            <button aria-current="false" onclick="showTab('tab2')"
                class="tab-button w-full flex justify-center font-medium rounded-l px-5 py-2 border bg-white text-gray-800 border-gray-200 rounded hover:bg-red-200">
                Nível 2
            </button>
            <button aria-current="false" onclick="showTab('tab3')"
                class="tab-button w-full flex justify-center font-medium rounded-l px-5 py-2 border bg-white text-gray-800 border-gray-200 rounded hover:bg-red-200">
                Nível 3
            </button>
            <button aria-current="false" onclick="showTab('tab4')"
                class="tab-button w-full flex justify-center font-medium rounded-l px-5 py-2 border bg-white text-gray-800 border-gray-200 rounded hover:bg-red-200">
                Nível 4
            </button>

        </div>
        <select id="tabSelect" class="flex w-full rounded shadow min-[768px]:hidden mb-3">
            <option value="tab5">Todo os posts</option>
            <option value="tab1"> Nível 1 </option>
            <option value="tab2"> Nível 2 </option>
            <option value="tab3"> Nível 3 </option>
            <option value="tab4"> Nível 4 </option>
        </select>
        <!-- Tab Content -->

        <div id="tab1"
            class=" tab-content bg-white shadow-md  hidden rounded-lg h-[calc(100vh_-_303px)] overflow-y-auto">
            <?php include_once insertComponent("admin/home/level1.php") ?>
        </div>
        <div id="tab2"
            class=" tab-content bg-white shadow-md rounded-lg hidden h-[calc(100vh_-_303px)] overflow-y-auto">
            <?php include_once insertComponent("admin/home/level2.php") ?>

        </div>
        <div id="tab3"
            class=" tab-content bg-white shadow-md rounded-lg hidden h-[calc(100vh_-_303px)] overflow-y-auto">
            <?php include_once insertComponent("admin/home/level3.php") ?>

        </div>
        <div id="tab4"
            class=" tab-content bg-white shadow-md rounded-lg hidden h-[calc(100vh_-_303px)] overflow-y-auto">
            <?php include_once insertComponent("admin/home/level4.php") ?>
        </div>
        <div id="tab5" class=" tab-content bg-white shadow-md rounded-lg h-[calc(100vh_-_303px)] overflow-y-auto">
            <?php include_once insertComponent("admin/home/online.php") ?>
        </div>

    </main>
</div>

<?php
include insertComponent("footer.php");
?>