<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="CACHE-CONTROL" content="NO-CACHE" />
    <meta http-equiv="PRAGMA" content="NO-CACHE" />
    <script src=<?= insertScript("jquery.js") ?>></script>
    <script src=<?= insertScript("tailwind.js") ?>></script>
    <script src=<?= insertScript("validate.js") ?>></script>
    <script src=<?= insertScript("validation.js") ?>></script>
    <link rel="shortcut icon" href=<?= insertImage("orbital/logo.ico") ?> type="image/x-icon" />
    <title>Orbital Channel - Login</title>
</head>

<body class="min-h-screen">
    <main class="">
        <div class="flex flex-col justify-center items-center gap-y-5 h-[calc(100vh_-_53px)] w-full">
            <div class="w-1/4 flex justify-center ">
                <a href="/"><img src=<?= insertImage("orbital/logo.png") ?> alt="logo" class="w-36" /></a>
            </div>
            <form id="loginForm" method="post" action="session/store"
                class="flex flex-col justify-center items-center gap-y-3">
                <input id="email" class="border-2 border-black rounded-md pl-3" autocomplete="off" type="email"
                    name="email" placeholder="Digite o Email" value="n3586@hotmail.com" />
                <input id="password" class="border-2 border-black rounded-md pl-3" autocomplete="off" type="password"
                    name="password" placeholder="Digite a senha" value="123" />
                <button type="submit"
                    class="cursor-pointer text-xl bg-black text-white w-20 text-center my-3 rounded-md">Entrar</button>
                <div class="text-red-500 font-bold"><?= $warningAcess ?></div>
            </form>
        </div>
        </div>
    </main>
    <?php
    include insertComponent("footer.php");
    ?>
</body>