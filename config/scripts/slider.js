$(document).ready(() => {
  let current = 1;

  $("#slide").on("mousemove", function (e) {
    let slideArea = $("#slide").width() / 2;
    let mousePosition = e.clientX - $("#slide").width();
    if (mousePosition < slideArea) {
      $("#nextSlide").show();
      $("#previousSlide").hide();
    } else if (mousePosition > slideArea) {
      $("#nextSlide").hide();
      $("#previousSlide").show();
    }
  });

  $("#slide").on("mouseleave", function () {
    console.log("saiu");
    $("#nextSlide").hide();
    $("#previousSlide").hide();
  });

  $("#nextSlide").on("mouseenter", function () {
    $("#nextSlide").show();
  });

  $("#previousSlide").on("mouseenter", function () {
    $("#previousSlide").show();
  });

  $("#previousSlide").on("click", () => {
    if (current === 0) {
      current = 0;
    } else {
      current -= 1;
      $("#slide").css(
        "transform",
        `translateX(-${(current * 100).toString()}%)`
      );
    }
  });

  $("#nextSlide").on("click", () => {
    if (current >= 3) {
      current = 3;
    } else {
      current += 1;
      $("#slide").css(
        "transform",
        `translateX(-${(current * 100).toString()}%)`
      );
    }
  });

  // setInterval(() => {
  //   current++;
  //   if (current > 3) {
  //     current = 0;
  //   }
  //   $("#slide").css("transform", `translateX(-${(current * 100).toString()}%)`);
  // }, 2000);
});
