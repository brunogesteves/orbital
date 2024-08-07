$(document).ready(function () {
  $("#adFileUpload").on("change", function () {
    if (typeof FileReader != "undefined") {
      var previewInputImage = $("#previewInputAdImage");
      previewInputImage.empty();

      var reader = new FileReader();
      reader.onload = function (e) {
        $("#previewInputAdImage").html(
          `<img src=${e.target.result} class="thumb-image w-full " />`
        );
      };
      previewInputImage.show();
      reader.readAsDataURL($(this)[0].files[0]);
    }
  });

  $(".adUpdateFileUpload").on("change", function () {
    $(".previewUploadInputAdImage").hide();
    var index = $(".adUpdateFileUpload").index(this);

    if (typeof FileReader != "undefined") {
      var previewUploadInputAdImage = $(
        `.previewUploadInputAdImage:eq(${index})`
      );
      previewUploadInputAdImage.empty();

      var reader = new FileReader();
      reader.onload = function (e) {
        $(`.previewUploadInputAdImage:eq(${index})`).html(
          `<img src=${e.target.result} class="thumb-image w-full h-44 " />`
        );
      };
      previewUploadInputAdImage.show();
      reader.readAsDataURL($(this)[0].files[0]);
    }
  });

  $(".openNewModalbtn").on("click", function () {
    $(`.fullscreen.newAdModal`).modal("toggle");
  });

  $(".closeNewAdModalbtn").on("click", function () {
    $(`.fullscreen.newAdModal`).modal("toggle");
  });

  $(".openUpdateAdModalbtn").on("click", function () {
    var index = $(".openUpdateAdModalbtn").index(this);
    $(`.fullscreen.updateAdModal:eq(${index})`).modal("toggle");
  });

  $(".closeUpdateAdModalbtn").on("click", function () {
    var index = $(".closeUpdateAdModalbtn").index(this);
    $(`.fullscreen.updateAdModal:eq(${index})`).modal("toggle");
  });

  $(".menu .item").tab();

  const schedule = new Date($("#post_at").val()).getTime();
  const timeNow = Date.now();
  if (schedule < timeNow) {
    $("#post_at").prop("disabled", true);
  } else {
    $("#post_at").prop("disabled", false);
  }

  $("#menu_mobile_open").on("click", function () {
    $(".ui.sidebar").sidebar("toggle");
  });
  $("#menu_tablet_open").on("click", function () {
    $(".ui.sidebar").sidebar("toggle");
  });

  const tabs = ["mobileAdsfront", "mobileAdsMobile", "mobileAdsSlide"];
  $(".selectAdTab").change(function (e) {
    for (let index = 0; index < tabs.length; index++) {
      if (tabs[index] == e.target.value) {
        $(`#${tabs[index]}`).removeClass("hidden");
      } else {
        $(`#${tabs[index]}`).addClass("hidden");
      }
    }
  });

  var fixmeTop = $(".selectAdTab").offset().top;

  $(window).scroll(function () {
    var currentScroll = $(window).scrollTop();

    if (currentScroll >= fixmeTop) {
      $(".selectAdTab").css({
        position: "fixed",
        top: "0",
        left: "0",
      });
    } else {
      $(".selectAdTab").css({
        position: "static",
      });
    }
  });
});
