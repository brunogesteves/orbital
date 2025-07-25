$(document).ready(() => {
  $("#makeSearch").on("click", function () {
    console.log($("#searchTerm").val());
    $("#searchResults").empty();
    $.ajax({
      type: "GET",
      url: "/Utils/makesearch.php",
      data: { searchTerm: $("#searchTerm").val().trim() },
      success: function (data) {
        $("#searchResults").append(data);
        console.log(data);
      },
      error: function (res) {
        alert("error");
      },
    });
  });
});
