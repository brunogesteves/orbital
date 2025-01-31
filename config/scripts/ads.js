$(document).ready(function () {
  $("#adFileUpload").on("change", function () {
    if (typeof FileReader != "undefined") {
      $("#previewInputAdImage").empty();

      var reader = new FileReader();
      reader.onload = function (e) {
        $("#previewInputAdImage").html(
          `<img src=${e.target.result} class="h-[150px] w-[1300px] my-5"  />`
        );
      };
      $("#previewInputAdImage").show();
      $("#oldImage").remove();
      reader.readAsDataURL($(this)[0].files[0]);
    }
  });

  let date1 = new Date();
  let date2 = new Date();

  $("#startsAt").on("input", () => {
    date1 = new Date($("#startsAt").val());
    verifyHours();
  });

  $("#endsAt").on("input", () => {
    date2 = new Date($("#endsAt").val());
    verifyHours();
  });

  function verifyHours() {
    if (date1 > date2) {
      $("#clockWarning").removeClass("hidden");
      $("#buttonSubmit").prop("disabled", true);
    } else {
      $("#clockWarning").addClass("hidden");
      $("#buttonSubmit").prop("disabled", false);
    }
  }

  const oldStartAt = new Date($("#oldStartsAt").val() * 1000)
    .toISOString()
    .substring(0, 16);

  $("#startsAt").val(oldStartAt);

  const oldEndstAt = new Date($("#oldEndsAt").val() * 1000)
    .toISOString()
    .substring(0, 16);

  $("#endsAt").val(oldEndstAt);
});
