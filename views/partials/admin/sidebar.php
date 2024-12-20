<div class=" flex justify-start items-center text-start flex-col h-full w-full text-white gap-y-2 pl-3 pt-4 text-xl bg-black ">
    <div class="w-3/4 flex justify-start group flex-col cursor-pointer">
        <a href="/admin">Posts</a>
        <div class="hidden group-hover:block mt-3 cursor-pointer">
            <a href="/admin/adicionar">
                Adicionar Post</a>
        </div>
    </div>
    <?php if ($_SESSION["user"]["role"] == "dir"): ?>
        <div class="w-3/4 cursor-pointer">
            <a href="/admin/ads">Anúncios</a>
        </div>
    <?php endif; ?>
    <!-- <div class="w-3/4 cursor-pointer">
        <a href="/admin/procurar">
            Procurar
        </a>
    </div> -->
    <div class="w-3/4 cursor-pointer">
        <a href="/admin/imagens">Imagens</a>
    </div>
    <div class="w-3/4 cursor-pointer">
        <a href="/" target="_blank">Home Page</a>
    </div>
</div>