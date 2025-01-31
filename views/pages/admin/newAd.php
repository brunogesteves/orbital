<?php
include insertComponent("admin/header.php");
?>

<div class="mx-auto mt-2 flex">
    <?php
    include insertComponent("admin/sidebar.php");
    ?>
    <main class="w-full max-[768px]:w-full h-auto overflow-y-auto flex justify-center items-center ">
        <form id="adForm" method="post" action="/admin/ads/create" enctype="multipart/form-data"
            class="flex  flex-col items-center h-[calc(100vh_-_261px)]">
            <div class="space-y-5 w-96">
                <div class="flex justify-center items-center flex-col gap-y-5 max-[768px]:w-full ">
                    <p class="text-black text-xl">Título:</p>
                    <input type="text" name="title" placeholder="título"
                        class="w-full rounded-lg focus:outline pl-2 placeholder:text-black border-[1px] border-black text-xl" />
                </div>
                <div class="w-full">
                    <p class="text-black text-xl">Link:</p>
                    <input type="text" name="link" placeholder="link"
                        class="w-full rounded-lg focus:outline pl-2 placeholder:text-black border-[1px] border-black text-xl" />
                </div>
                <div class="w-full flex justify-between items-center max-[768px]:flex-col max-[768px]:gap-y-5">
                    <div>
                        <p class="text-black text-xl">Status:</p>
                        <input type="checkbox" name="status" />
                        <label class="text-black text-xl ml-3">Ativo</label>
                    </div>
                    <div>
                        <p class="text-black text-xl">Posição:</p>
                        <select name="position" class="text-xl">
                            <option value="">Escolha a Posição</option>
                            <option value="news">Notícia</option>
                            <option value="top">Topo</option>
                            <option value="mobile">Mobile</option>
                        </select>

                    </div>
                </div>
            </div>
            <div class="w-full text-center text-black my-5">
                <p class="text-black text-xl">foto:</p>
                <input type="file" id="adFileUpload" name="image" accept="image/*">
                <div id="previewInputAdImage"></div>
                <!-- `<img src="../public/images/ads/er,png" class="h-[150px] w-[1300px] my-5" />` -->
            </div>
            <div class="space-y-5 w-96">
                <div class="w-full flex justify-between gap-x-5 max-[768px]:flex-col max-[768px]:gap-y-5">
                    <div class="w-full">
                        <p class="text-black text-xl">Começa em:</p>
                        <input type="datetime-local" id="startsAt" name="startsAt" min="<?= $minTime ?>"
                            class="w-full rounded-lg py-1 px-5 text-sm border-[1px] border-black" />
                    </div>
                    <div class="w-full">
                        <p class="text-black text-xl">Termina em:</p>
                        <input type="datetime-local"
                            class="w-full rounded-lg py-1 px-5 text-sm border-[1px] border-black" id="endsAt"
                            name="endsAt" min="<?= $minTime ?>" />
                    </div>
                </div>
                <p id="clockWarning" class='text-red-500 hidden'>Horários errados</p>
                <div class="flex justify-center items-center w-full gap-x-10 max-[768px]:mb-10">
                    <div>
                        <button type="submit" id="buttonSubmit"
                            class="bg-gray-400 w-auto rounded-lg py-1 px-5  mb-5  text-sm border-[1px] border-black">
                            Criar
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </main>
</div>

<?php
include insertComponent("admin/footer.php");
?>
<script src=<?= insertAdminScript("ads.js") ?>></script>