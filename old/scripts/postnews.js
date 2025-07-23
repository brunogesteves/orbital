$(document).ready(() => {
  const img = document.getElementsByTagName("img");

  for (let i = 0; i < img.length; i++) {
    $("img")
      .eq(i)
      .on("error", function () {
        $(this).attr(
          "src",
          "https://orbitaltv.net/images/orbital/imageerror.png"
        );
      })
      .attr("src", img[i].src);
  }

  $("#completeArticleMobile").hide();

  $("#showCompleteArticleBtnMobile").click(function () {
    $("#shortArticleMobile").hide();
    $("#showCompleteArticleBtnMobile").hide();
    $(".morePosts").hide();

    $("#completeArticleMobile").show();
  });

  $("#completeArticleFront").hide();

  $("#showCompleteArticleBtnFront").click(function () {
    $("#shortArticleFront").hide();
    $("#showCompleteArticleBtnFront").hide();
    $(".morePosts").hide();

    $("#completeArticleFront").show();
  });

  $("#menu_mobile_open").on("click", function () {
    $(".ui.sidebar").sidebar("toggle");
  });
  $("#menu_tablet_open").on("click", function () {
    $(".ui.sidebar").sidebar("toggle");
  });

  $("#sliderAdsHeaderPostMobile").slick({
    dots: false,
    infinite: true,
    speed: 1000,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    autoplay: true,
    autoplaySpeed: 2000,
  });

  $("#scrollToUp").click(function () {
    // $(window).animate({ scrollTop: 0 }, "500");
    $(window).scrollTop(0);
  });
});
