$(document).ready(function () {
  $("img").on("error", function () {
    const defaultImage = "https://orbitaltv.net/images/orbital/logo.png";
    $(this).attr("src", defaultImage);
    $(this).attr("alt", "Orbital Channel");
  });

  $("#openModalLogotype").click(function () {
    document.querySelector("dialog").showModal();
  });
  $("#closeModalLogotype").click(() => {
    document.querySelector("dialog").close();
  });

  $("#scrollToUp").on("click", function () {
    alert("sdsd");
    // $(window).animate({ scrollTop: 0 }, "500");
    // $(window).scrollTop(0);
  });
  $("#newLogotypeImage").on("change", function () {
    if (typeof FileReader != "undefined") {
      $("#previewNewLogotype").empty();

      var reader = new FileReader();
      reader.onload = function (e) {
        $("#previewNewLogotype").html(
          `<img src=${e.target.result} class="size-96 object-scale-down flex-none " />`
        );
      };
      $("#previewNewLogotype").show();
      $("#oldLogotype").empty();
      reader.readAsDataURL($(this)[0].files[0]);
    }
  });

  setInterval(() => {
    $("#timestamp").text(
      new Date().toLocaleString("pt-BR", { timeZone: "America/Sao_Paulo" })
    );
  }, 1000);

  $("#tabSelect").on("change", (e) => {
    var tabId = e.target.value;
    const tabContents = document.querySelectorAll(".tab-content");
    tabContents.forEach((content) => {
      content.classList.add("hidden");
    });

    document.getElementById(tabId).classList.remove("hidden");
  });

  $(window).on("resize", () => {
    $("#size").text($(window).width());
  });

  $("#openMenuMobile").on("click", function () {
    $(".sidebar").removeClass("hidden");
  });

  $("#closeMenuMobile").on("click", function () {
    $(".sidebar").addClass("hidden");
  });
});
