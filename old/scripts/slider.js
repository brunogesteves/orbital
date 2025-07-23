$(document).ready(() => {
  $("#scrollToUp").click(function () {
    $(window).scrollTop(0);
  });

  $(".sliderArea").on("mousemove", function (e) {
    let slideArea = $(".sliderArea").width() / 2;
    let mousePosition = e.clientX - $(".sliderArea").width();
    if (mousePosition > slideArea) {
      $("#nextImg").show();
      $("#previewImg").hide();
    } else if (mousePosition < slideArea) {
      $("#nextImg").hide();
      $("#previewImg").show();
    }
  });

  $(".sliderArea").on("mouseleave", function () {
    $(".nextImg").hide();
    $(".previewImg").hide();
  });

  $(".sliderMobile").slick({
    dots: false,
    infinite: true,
    speed: 1000,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    autoplay: true,
    autoplaySpeed: 2000,
  });

  $(".sliderFront").slick({
    dots: false,
    infinite: true,
    prevArrow: $("#previewImg"),
    nextArrow: $("#nextImg"),
    speed: 1000,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    autoplay: true,
    autoplaySpeed: 2000,
  });

  $(".sliderAdSlide").slick({
    dots: false,
    infinite: true,
    speed: 1000,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    autoplay: true,
    autoplaySpeed: 2000,
  });

  $(".sliderHeaderFront").slick({
    dots: false,
    infinite: true,
    speed: 1000,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    autoplay: true,
    autoplaySpeed: 2000,
  });
});
