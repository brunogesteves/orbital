<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=yes">
    <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
    <meta http-equiv="Pragma" content="no-cache">
    <META HTTP-EQUIV="Expires" CONTENT="-1">

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="CACHE-CONTROL" content="NO-CACHE" />
    <meta http-equiv="PRAGMA" content="NO-CACHE" />
    <META HTTP-EQUIV="Expires" CONTENT="-1">

    <script src=<?= insertAdminScript("jquery.js") ?>></script>
    <script src=<?= insertAdminScript("tailwind.js") ?>></script>
    <script src=<?= insertAdminScript("admin.js") ?>></script>
    <script src=<?= insertAdminScript("tabs.js") ?>></script>
    <script src=<?= insertAdminScript("validate.js") ?>></script>
    <script src=<?= insertAdminScript("validation.js") ?>></script>
    <link rel="shortcut icon" href=<?= insertAdminImage("orbital/logo.ico") ?> type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href=<?= insertAdminStyle("styles.css") ?>>
    <title>Orbital Channel</title>
</head>

<body class="font-sans antialiased ">
    <header
        class="flex justify-between items-center h-[200px]  max-[768px]:h-auto max-[768px]:flex-col max-[768px]:gap-y-3 max-[768px]:mb-10">
        <?php /* if ($_SESSION["user"]["role"] == "dir"): */ ?>
        <div id="openModalLogotype"
            class="flex justify-center items-center w-1/3 max-[768px]:w-full h-full overflow-hidden relative hover:opacity-70  cursor-pointer">
            <img src=<?= insertAdminImage("orbital/logo.png") ?> alt="logo"
                class="h-full w-full object-scale-down flex-none max-[768px]:size-20" />
            <span
                class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-xl text-white  bg-black rounded-lg px-2">
                Mudar Logotipo </span>
        </div>
        <?php /*endif;*/ ?>
        <?php /* if ($_SESSION["user"]["role"] == "dir"): */ ?>
        <!-- <div class="flex justify-center items-center w-1/3 max-[768px]:w-full h-full overflow-hidden  ">
            <img src=<?= insertAdminImage("orbital/logo.png") ?> alt="logo"
                class="h-full w-full object-scale-down flex-none max-[768px]:size-20" />
        </div> -->
        <?php /*endif;*/ ?>

        <div id="timestamp"
            class="flex justify-center items-center w-1/3 max-[768px]:w-full h-full text-5xl max-[768px]:text-2xl min-[768px]:w-fullfont-bold">
        </div>
        <div class="flex justify-center max-[768px]:justify-around items-center w-1/3 max-[768px]:w-full h-full ">
            <button id="openMenuMobile" class="min-[768px]:hidden">
                <img src=<?= insertAdminImage("icons/menu.svg") ?> class="size-10" />
            </button>
            <form method="POST" action="/session/destroy">

                <span><?= $_SESSION["user"]["name"] ?>, você esta logado</span>
                <button type="submit" name="_method" value="DELETE"
                    class="cursor-pointer ml-5 text-xl bg-black text-white w-20 text-center rounded-md">
                    Sair</button>
            </form>
        </div>
    </header>
    <dialog id="dialogLogotype" class="w-[95%] max-[768px]:h-[70%] h-[95%] bg-blue-500 fixed ">
        <form id="updateLogotypeForm" method="POST" action="/admin/images/updatelogotype" enctype="multipart/form-data"
            class="pt-10 flex flex-col justify-start max-[768px]:justify-start items-center">
            <input type="file" name="newLogotypeImage" id="newLogotypeImage" required accept=".png"
                class="outline:none" />
            <input type="hidden" name="url" value=<?= $_SERVER['REQUEST_URI']; ?> />
            <div id="oldLogotype">
                <img src=<?= insertAdminImage("orbital/logo.png") ?> alt="logo"
                    class="size-96 max-[768px]:size-52 object-scale-down flex-none" />
            </div>
            <div id="previewNewLogotype"></div>
            <button type="submit" name="_method" value="put"
                class="text-white bg-black my-7 p-2 rounded-lg text-xl">Mudar Logotipo</button>
        </form>
        <button id="closeModalLogotype" class="text-white ">
            <img src=<?= insertAdminImage("icons/close.png") ?> alt="logo"
                class="size-10 max-[768px]:size-5 object-scale-down flex-none absolute top-4 right-4" />
        </button>
    </dialog>