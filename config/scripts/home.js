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

  $("#completeArticleFront").hide();

  $("#showCompleteArticleBtnFront").click(function () {
    $("#shortArticleFront").hide();
    $("#showCompleteArticleBtnFront").hide();
    $(".morePosts").hide();

    $("#completeArticleFront").show();
  });

  $("#openMenuMobile").on("click", function () {
    $(".sidebar").removeClass("left-[-100%]");
  });

  $("#closeMenuMobile").on("click", function () {
    $(".sidebar").addClass("left-[-100%]");
  });

  $(window).on("resize", () => {
    $("#size").text($(window).width());
  });
});
