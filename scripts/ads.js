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
        $("#previewUploadInputAdImage").html(
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

  // var fixmeTop = $(".selectAdTab").offset().top;

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

  // $(".openUpdateAdModalbtn").on("click", function () {
  //   var index = $(".openUpdateAdModalbtn").index(this);
  //   $(`.fullscreen.updateAdModal:eq(${index})`).modal("toggle");
  // });

  $(".openUpdateAdModalbtn").click(function () {
    var index = $(".openUpdateAdModalbtn").index(this);
    console.log(index);

    const name = $(".name").eq(index).text().trim();
    const file = $(".file").eq(index).text().trim();
    const position = $(".position").eq(index).text().trim();
    const link = $(".link").eq(index).text().trim();
    const starts_at = $(".starts_at").eq(index).text().trim();
    const postId = $(".postId").eq(index).text().trim();

    console.log(postId);

    $("#modalUpdateAdAreaName").val(name);
    $("#previewUploadInputAdImage").html(
      `<img src="../images/ads/${file}" class="thumb-image w-full " />`
    );
    $("#modalUpdateAdAreaPosition").val(position);
    $("#modalUpdateAdAreaLink").text(link);
    $("#modalUpdateAdAreaId").val(postId);

    const newStartsAt =
      starts_at[6] +
      starts_at[7] +
      starts_at[8] +
      starts_at[9] +
      starts_at[5] +
      starts_at[3] +
      starts_at[4] +
      starts_at[5] +
      starts_at[0] +
      starts_at[1] +
      "T" +
      starts_at[11] +
      starts_at[12] +
      ":" +
      starts_at[14] +
      starts_at[15];

    $("#modalUpdateAdAreaStartsAt").val(newStartsAt.replaceAll("/", "-"));

    const newFinishsAt =
      starts_at[6] +
      starts_at[7] +
      starts_at[8] +
      starts_at[9] +
      starts_at[5] +
      starts_at[3] +
      starts_at[4] +
      starts_at[5] +
      starts_at[0] +
      starts_at[1] +
      "T" +
      starts_at[11] +
      starts_at[12] +
      ":" +
      starts_at[14] +
      starts_at[15];

    $("#modalUpdateAdAreaFinishsAt").val(newFinishsAt.replaceAll("/", "-"));

    //   $("#exPostUpdateHour").prop(
    //     "disabled",
    //     new Date(newHour) < new Date() == true ? "disabled" : ""
    //   );
    // }
    $(`.fullscreen.updateAdModal`).modal("toggle");
  });
});
