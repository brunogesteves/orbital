<div
    class=" min-[768px]:hidden sidebar fixed top-0 bottom-0 p-2 w-[300px] overflow-y-auto text-center bg-white left-[-100%] animate transition-transform duration-700 ease-out">
    <button id="closeMenuMobile" class="text-white ">
        <img src=<?= insertAdminImage("icons/closeBlack.png") ?> alt="logo"
            class="size-10 max-[768px]:size-3 object-scale-down flex-none absolute top-4 right-4" />
    </button>
    <div class="text-gray-100 text-xl">
        <div class="p-2.5 mt-1 flex items-center">
            <img src=<?= insertAdminImage("orbital/logo.png") ?> alt="logo" class="max-[768px]:size-10 " />
            <h1 class="font-bold  text-xl ml-3 mt-5 text-black">Orbital</h1>
            <i class="bi bi-x cursor-pointer ml-28 lg:hidden"></i>
        </div>
    </div>
    <div class="my-4 bg-gray-600 h-[1px]"></div>

    <div class="text-left text-sm mt-2 w-4/5 mx-auto text-gray-200 font-bold" id="submenu">
        <?php
        foreach ($categories as $cat) : ?>
            <h1 class="cursor-pointer p-2 font-bold text-black rounded-md mt-1 uppercase">
                <?= $cat ?>
            </h1>
        <?php endforeach; ?>
    </div>
</div>