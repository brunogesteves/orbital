<?php
include insertComponent("admin/header.php");
?>

<div class="mx-auto mt-2 flex">
    <?php
    include insertComponent("admin/sidebar.php");
    ?>
    <main class="w-full max-[768px]:w-full h-full overflow-y-auto mb-5">
        <div
            class="w-full  px-2 flex max-[768px]:flex-col justify-center items-start min-[768px]:h-[calc(100vh_-_261px)] overflow-y-auto ">
            <form method="post" action="/admin/ads/update" enctype="multipart/form-data"
                class="flex justify-center items-center flex-col gap-y-5 w-auto max-[768px]:w-full bg">
                <div class="w-full">
                    <p class="text-black text-xl">Título:</p>
                    <input type="text" placeholder="título" value="<?= $ad["title"] ?>" disabled
                        class="w-full rounded-lg focus:outline pl-2 placeholder:text-black border-[1px] border-black text-xl" />

                </div>
                <div class="w-full">
                    <p class="text-black text-xl">Link:</p>
                    <input type="text" name="link" placeholder="link" value="<?= $ad["link"] ?>"
                        class="w-full rounded-lg focus:outline pl-2 placeholder:text-black border-[1px] border-black text-xl" />

                </div>
                <div class="w-full flex justify-between items-center max-[768px]:flex-col max-[768px]:gap-y-5">
                    <div>
                        <p class="text-black text-xl">Status:</p>
                        <input type="checkbox" name="status" <?php if ($ad["status"] == "on"): ?> checked
                            <?php endif; ?> />
                        <label class="text-black text-xl ml-3">Ativo</label>
                    </div>
                    <div>
                        <p class="text-black text-xl">Posição:</p>
                        <select name="position" class="text-xl">
                            <option value="mobile" <?php if ($ad["position"] == "mobile"): ?> selected <?php endif; ?>>
                                Mobile</option>
                            <option value="news" <?php if ($ad["position"] == "news"): ?> selected <?php endif; ?>>
                                Notícia
                            </option>
                            <option value="top" <?php if ($ad["position"] == "top"): ?> selected <?php endif; ?>>Topo
                            </option>
                        </select>
                    </div>
                </div>
                <div class="w-full text-center text-black">
                    <p class="text-black text-xl">foto:</p>
                    <input type="file" id="adFileUpload" name="image" accept="image/*">
                    <img id="oldImage" src=<?= insertAdminImage("ads/" . $ad['image']) ?> alt=<?= $ad["image"] ?> />
                    <div id="previewInputAdImage"></div>

                </div>
                <div class="w-full flex justify-between gap-x-5 max-[768px]:flex-col max-[768px]:gap-y-5">
                    <div class="w-full">
                        <p class="text-black text-xl">Começa em: <?= $ad["startsAt"] ?> </p>
                        <input type="datetime-local" id="startsAt" name="startsAt" min="<?= $minTime ?>"
                            class=" w-full rounded-lg py-1 px-5 text-sm border-[1px] border-black"
                            value="<?= date('Y-m-d\TH:i', $ad["startsAt"]) ?>" />
                    </div>
                    <div class="w-full">
                        <p class="text-black text-xl">Termina em:</p>
                        <input type="datetime-local"
                            class="w-full rounded-lg py-1 px-5 text-sm border-[1px] border-black" id="endsAt"
                            name="endsAt" min="<?= $minTime ?>" value="<?= date('Y-m-d\TH:i', $ad["endsAt"]); ?>" />

                    </div>
                </div>
                <p id="clockWarning" class='text-red-500 hidden'>Horários errados</p>
                <input type="hidden" name="id" value="<?= $ad["id"] ?>" />
                <input type="hidden" name="title" value="<?= $ad["title"] ?>" />

                <div class="flex justify-center items-center w-full gap-x-10 max-[768px]:mb-10">
                    <div>
                        <button type="submit" id="buttonSubmit" name="_method" value="put"
                            class="bg-gray-400 w-auto rounded-lg py-1 px-5 text-sm border-[1px] border-black">
                            Atualizar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </main>
</div>

<?php
include insertComponent("admin/footer.php");
?>
<script src=<?= insertAdminScript("ads.js") ?>></script>