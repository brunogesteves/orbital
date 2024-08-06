$(document).ready(() => {
  // const urlToStrip = $(location).attr("href");

  // function stripUrl(urlToStrip) {
  //   let stripped = urlToStrip.split("?")[0];
  //   return stripped;
  // }

  // window.history.replaceState(null, "", stripUrl(urlToStrip));
  function setDataExternalModal(data) {
    $(".externalInfoModalTitle").text(data[0]);
    $(".externalInfoModalMedia").html(
      `<img src=${data[1]} alt="image" class="w-full "/>`
    );
    $(".externalInfoModalSummary").text(data[3]);
    $(".externalInfoModalClean_url").text(data[2]);
    $(".externalInfoModalTitle").val(data[0]);
    $(".externalInfoModalMedia").val([data[1]]);
    $(".externalInfoModalSummary").val(data[3]);
    $(".externalInfoModalClean_url").val(data[2]);
    $(".externalInfoModalLink").val(data[4]);

    console.log(data);
  }

  $(".openExternalInfoMobileModalbtn").on("click", function () {
    var index = $(".openExternalInfoMobileModalbtn").index(this);
    const title = $(".inputSearchTitle").eq(index).val();
    const media = $(".inputSearchMedia").eq(index).val();
    const clean_url = $(".inputSearchClean_url").eq(index).val();
    const summary = $(".inputSearchSummary").eq(index).val();
    const link = $(".inputSearchLink").eq(index).val();

    const data = [title, media, clean_url, summary, link];
    setDataExternalModal(data);

    $(".fullScreen.externalInfoModal").modal("show");
  });

  $(".openExternalInfoComputerModalbtn").on("click", function () {
    var index = $(".openExternalInfoComputerModalbtn").index(this);

    const title = $(".inputSearchTitle").eq(index).val();
    const media = $(".inputSearchMedia").eq(index).val();
    const clean_url = $(".inputSearchClean_url").eq(index).val();
    const summary = $(".inputSearchSummary").eq(index).val();
    const link = $(".inputSearchLink").eq(index).val();

    const data = [title, media, clean_url, summary, link];
    setDataExternalModal(data);

    $(".fullScreen.externalInfoModal").modal("show");
  });

  $(".closeExternalInfoModalbtn").on("click", function () {
    var index = $(".closeExternalInfoModalbtn").index(this);
    $(".fullScreen.externalInfoModal").modal("hide");
  });

  $("#menu_mobile_open").on("click", function () {
    $(".ui.sidebar").sidebar("toggle");
  });
  $("#menu_tablet_open").on("click", function () {
    $(".ui.sidebar").sidebar("toggle");
  });
});
