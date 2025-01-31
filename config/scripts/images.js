$(document).ready(function () {
  $("#fileImageUpload").on("change", function () {
    if (typeof FileReader != "undefined") {
      $("#previewInputImage").empty();

      var reader = new FileReader();
      reader.onload = function (e) {
        $(".previewInputImage").html(
          `<img src=${e.target.result} class="thumb-image w-48 max-[768px]:w-full max-[768px]:mt-2 " />`
        );
      };
      $("#previewInputImage").show();
      reader.readAsDataURL($(this)[0].files[0]);
    }
  });

  $(".openDialogSeeImage").on("click", function (e) {
    var index = $(".openDialogSeeImage").index(this);
    var fileName = $(".openDialogSeeImage").data("value");

    $("#watchTheImage").html(
      `<img src='../../public/images/${fileName}' alt='logo'   />`
    );

    document.getElementById("dialogSeeImage").showModal();
  });

  $("#closeDialogSeeImage").on("click", function () {
    document.getElementById("dialogSeeImage").close();
  });
});
