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

  const tabs = ["adsfront", "adsMobile", "adsSlide"];

  $(".selectAdTab").change(function (e) {
    for (let index = 0; index < tabs.length; index++) {
      if (tabs[index] == e.target.value) {
        $(`#${tabs[index]}`).addClass("active");
      } else {
        $(`#${tabs[index]}`).removeClass("active");
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

  $(".openUpdateAdModalbtn").click(function () {
    var index = $(".openUpdateAdModalbtn").index(this);
    console.log(index);

    const name = $(".name").eq(index).text().trim();
    const file = $(".file").eq(index).text().trim();
    const position = $(".position").eq(index).text().trim();
    const link = $(".link").eq(index).text().trim();
    const startsAt = $(".starts_at").eq(index).text().trim();
    const finistsAt = $(".finishs_at").eq(index).text().trim();
    const postId = $(".postId").eq(index).text().trim();

    $("#modalUpdateAdAreaName").val(name);
    $("#modalUpdateAdAreaHiddenName").val(name);
    $("#previewUploadInputAdImage").html(
      `<img src="../images/ads/${file}" class="thumb-image w-full " />`
    );
    $("#modalUpdateAdAreaPosition").val(position);
    $("#modalUpdateAdAreaLink").text(link);
    $("#modalUpdateAdAreaId").val(postId);

    const newStartsAt =
      startsAt[6] +
      startsAt[7] +
      startsAt[8] +
      startsAt[9] +
      startsAt[5] +
      startsAt[3] +
      startsAt[4] +
      startsAt[5] +
      startsAt[0] +
      startsAt[1] +
      "T" +
      startsAt[11] +
      startsAt[12] +
      ":" +
      startsAt[14] +
      startsAt[15];

    $("#modalUpdateAdAreaStartsAt").val(newStartsAt.replaceAll("/", "-"));

    const newFinishsAt =
      finistsAt[6] +
      finistsAt[7] +
      finistsAt[8] +
      finistsAt[9] +
      finistsAt[5] +
      finistsAt[3] +
      finistsAt[4] +
      finistsAt[5] +
      finistsAt[0] +
      finistsAt[1] +
      "T" +
      finistsAt[11] +
      finistsAt[12] +
      ":" +
      finistsAt[14] +
      finistsAt[15];

    $("#modalUpdateAdAreaFinishsAt").val(newFinishsAt.replaceAll("/", "-"));

    //   $("#exPostUpdateHour").prop(
    //     "disabled",
    //     new Date(newHour) < new Date() == true ? "disabled" : ""
    //   );
    // }
    $(`.fullscreen.updateAdModal`).modal("toggle");
  });
});
