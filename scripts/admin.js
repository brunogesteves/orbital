$(document).ready(function () {
  $("img").on("error", function () {
    const defaultImage = "https://orbitaltv.net/images/orbital/logo.png";
    $(this).attr("src", defaultImage);
    $(this).attr("alt", "Orbital Channel");
  });

  $(".ui.dimmer").dimmer({
    on: "hover",
  });

  $("#changeLogotype").on("click", (e) => {
    const fileName = e.target.id;
    // $("#modalImage").html(`<img src=../images/${fileName} />`);

    // $(".logotype").modal("show");
    $(".ui.modal.logotype").modal("show");
    $(`.infoModal`).hide();
  });

  $("#newLogotype").on("change", function () {
    if (typeof FileReader != "undefined") {
      var previewInputImage = $("#previewNewLogotype");
      previewInputImage.empty();

      var reader = new FileReader();
      reader.onload = function (e) {
        $("#previewNewLogotype").html(
          `<img src=${e.target.result} class="thumb-image w-full " />`
        );
      };
      previewInputImage.show();
      reader.readAsDataURL($(this)[0].files[0]);
    }
  });

  setInterval(() => {
    $("#timestamp").text(
      new Date().toLocaleString("pt-BR", { timeZone: "America/Sao_Paulo" })
    );
  }, 1000);

  $("#menu_mobile_open").on("click", function () {
    $(".ui.sidebar").sidebar("toggle");
  });
  $("#menu_tablet_open").on("click", function () {
    $(".ui.sidebar").sidebar("toggle");
  });
});
