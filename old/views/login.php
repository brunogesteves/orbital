<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="CACHE-CONTROL" content="NO-CACHE" />
    <meta http-equiv="PRAGMA" content="NO-CACHE" />
    <script src="scripts/tailwind.js"></script>
    <script src="/scripts/semantic.min.js"></script>

    <link rel="stylesheet" type="text/css" href="/styles/semantic.min.css">
    <link rel="shortcut icon" href="/images/orbital/logo.ico" type="image/x-icon" />
    <title>Orbital Channel - Login</title>
</head>

<body class="min-h-screen">
    <main class="">
        <div class="ui centered grid">
            <section class="two column mobile only row ">
            <div class=" flex flex-col justify-center items-center gap-y-5 h-[calc(100vh_-_74px)] w-full">
                    <div class="w-1/4 flex justify-center ">
                        <a href="/"><img src="/images/orbital/logo.png" alt="logo" class="w-36" /></a>
                    </div>
                    <form method="post" action="session/store" class="flex flex-col justify-center items-center gap-y-3">
                        <input id="email" class="input border-2 border-black rounded-md pl-3" autocomplete="off" type="email" name="email" placeholder="Digite o Email"  />
                        <div class="text-red-500 font-bold"><?= $formErrors["email"] ?></div>
                        <input id="password" class="input border-2 border-black rounded-md pl-3" autocomplete="off" type="password" name="password" placeholder="Digite a senha"  />
                        <div class="text-red-500 font-bold"><?= $formErrors["password"] ?></div>
                        <button type="submit" class="cursor-pointer text-xl bg-black text-white w-20 text-center my-3 rounded-md">Entrar</button>
                        <div class="text-red-500 font-bold"><?= $warningAcess ?></div>
                    </form>
                </div>
            </section>
            <section class="three column tablet only row">
                <?php
                include(__DIR__ . "/../Components/mobile.php");
                ?>
            </section>
            <section class="computer only row w-full">
                <div class=" flex flex-col justify-center items-center gap-y-5 h-[calc(100vh_-_74px)] w-full">
                    <div class="w-1/4 flex justify-center ">
                        <a href="/"><img src="/images/orbital/logo.png" alt="logo" class="w-72" /></a>
                    </div>
                    <form method="post" action="session/store" class="flex flex-col justify-center items-center w-3/12 gap-y-3">
                        <input id="email" class="input border-2 border-black rounded-md w-full pl-3" autocomplete="off" type="email" name="email" placeholder="Digite o Email"  />
                        <div class="text-red-500 font-bold"><?= $formErrors["email"] ?></div>
                        <input id="password" class="input border-2 border-black rounded-md w-full pl-3" autocomplete="off" type="password" name="password" placeholder="Digite a senha"  />
                        <div class="text-red-500 font-bold"><?= $formErrors["password"] ?></div>
                        <button type="submit" class="cursor-pointer text-xl bg-black text-white w-20 text-center my-3 rounded-md">Entrar</button>
                        <div class="text-red-500 font-bold"><?= $warningAcess ?></div>
                    </form>
                </div>

            </section>
        </div>
    </main>
    <footer class="bg-black text-white flex flex-col justify-center items-center  py-3 z-50">
        <img src="/images/orbital/logo.png" alt="logo" class="rounded-full w-10" />

        <span> Orbital Channel - Direitos Reservados</span>
    </footer>
</body>