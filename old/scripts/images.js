$(document).ready(function () {
  $(".dd").text("funcionando");
  $(".fileImageUpload").on("change", function () {
    if (typeof FileReader != "undefined") {
      var previewInputImage = $("#previewInputImage");
      previewInputImage.empty();

      var reader = new FileReader();
      reader.onload = function (e) {
        $(".previewInputImage").html(
          `<img src=${e.target.result} class="thumb-image w-48 max-[425px]:w-full " />`
        );
      };
      previewInputImage.show();
      reader.readAsDataURL($(this)[0].files[0]);
    }
  });

  $(".ui.dimmable").dimmer({
    on: "hover",
  });

  $(".seePicture").on("click", (e) => {
    const fileName = e.target.id;
    $("#modalImage").html(`<img src=../images/${fileName} />`);

    $(".ui.modal").modal("show");
  });

  $("#menu_mobile_open").on("click", function () {
    $(".ui.sidebar").sidebar("toggle");
  });
  $("#menu_tablet_open").on("click", function () {
    $(".ui.sidebar").sidebar("toggle");
  });
});
