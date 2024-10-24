<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="CACHE-CONTROL" content="NO-CACHE" />
    <meta http-equiv="PRAGMA" content="NO-CACHE" />
    <META HTTP-EQUIV="Expires" CONTENT="-1">


    <script src="/../scripts/jquery.js"></script>
    <script src="/../scripts/tailwind.js"></script>
    <script src="/../scripts/semantic.min.js"></script>
    <script src="/../scripts/admin.js" defer></script>
    <link rel="shortcut icon" href="../images/orbital/logo.ico" type="image/x-icon" />
    <script src="/../scripts/validate.js"></script>
    <script src="../scripts/validation.js"></script>
    <link rel="stylesheet" type="text/css" href="/../styles/semantic.min.css">
    <title>Orbital Channel</title>
</head>

<body>
    <div class="ui thin sidebar inverted vertical menu">
        <a class="item" href="/admin">Posts</a>
        <a class="item" href="/admin/adicionar">
            Adicionar novo Post</a>
        <?php if ($_SESSION["user"]["role"] == "dir"): ?>
            <a class="item" href="/admin/ads">Anúncios</a>
        <?php endif; ?>
        <!-- <a class="item" href="/admin/procurar">
            Procurar
        </a> -->
        <a class="item" href="/admin/imagens">Imagens</a>
        <a class="item" href="/" target="_blank">Home Page</a>

    </div>
    <header class="flex justify-between items-center  py-2 max-[430px]:flex-col max-[430px]:gap-y-5 ">
        <div class="flex flex-col items-center justify-center">
            <?php if ($_SESSION["user"]["role"] == "dir"): ?>
                <div class="ui medium">
                    <div class="ui dimmer">
                        <div class="content">
                            <div id="changeLogotype" class="ui button">Mudar Logotipo</div>
                        </div>
                    </div>
                <?php endif; ?>
                <img class="ui image size-20 object-center" src="../images/orbital/logo.png">
                </div>
        </div>
        <img src="../images/icons/menu.svg" alt="logo" class="min-[425px]:hidden rounded-full mt-3 mt-1 w-7 h-7 " id="menu_mobile_open" />
        <div class="ui modal logotype">
            <div class="flex flex-col justify-start items-center pt-10 min-h-96">
                <span class="text-3xl font-bold text-black">Selecione um novo Logotipo</span>
                <form method="POST" action="/admin/imagens/logotype" enctype="multipart/form-data" class="flex flex-col mt-10">
                    <input type="file" name="newLogotypeImage" id="newLogotype" required accept=".png" />
                    <button type="submit" name="_method" value="put" class="text-white bg-black my-7 p-2 rounded-lg text-xl">Mudar Logotipo</button>
                </form>
                <div id="previewNewLogotype"> </div>
                </form>
            </div>
        </div>
        <div class="text-2xl" id="timestamp"></div>
        <div class="flex justify-center items-center gap-x-5 text-2xl  h-fit">
            <?= $_SESSION["user"]["name"] ?>
            <form method="POST" action="../session/destroy">
                <button type="submit" name="_method" value="DELETE" class="cursor-pointer text-xl bg-black text-white w-20 text-center rounded-md">
                    Sair</button>
            </form>
        </div>
    </header>