$(document).ready(() => {
  $(".previewEditImage").html(
    `<img src=../images/${$(
      ".oldImageThumbComputer"
    ).val()} class="max-h-72" />`
  );

  const schedule = new Date($(".oldPost_at").val() * 1000)
    .toISOString()
    .substring(0, 16);

  $(".post_at").val(schedule);

  const reply = document.getElementsByClassName("editor");
  for (let i = 0; i < reply.length; i++) {
    const editor = SUNEDITOR.create(
      reply[i],

      {
        value: "",
        mode: "classic",
        rtl: false,
        katex: "window.katex",
        width: "90%",
        height: "50vh",
        placeholder: "Crie o post....É obrigatório",
        imageGalleryUrl: "http://orbitaltv.net/Core/gallery.php",
        videoFileInput: false,
        audioUrlInput: false,
        tabDisable: false,
        buttonList: [
          [
            "undo",
            "redo",
            "font",
            "fontSize",
            "formatBlock",
            "paragraphStyle",
            "blockquote",
            "bold",
            "underline",
            "italic",
            "strike",
            "subscript",
            "superscript",
            "fontColor",
            "hiliteColor",
            "textStyle",
            "removeFormat",
            "outdent",
            "indent",
            "align",
            "horizontalRule",
            "list",
            "lineHeight",
            "table",
            "link",
            // "image",
            // 'video',
            "audio",
            "math",
            "imageGallery",
            "fullScreen",
            "showBlocks",
            // "codeView",
            "preview",
            "print",
            "save",
            "template",
          ],
        ],
        lang: SUNEDITOR_LANG.pt_br,
        "lang(In nodejs)": "pt_br",
      }
    );
    editor.onChange = function (contents) {
      $(".content").val(contents);
      $(".oldContentComputer").val(contents);
    };
    editor.setContents($(".oldContentComputer").val());
  }

  $(".openEditImageModalBtn").on("click", () => {
    $(".editImageModal").modal("show");
  });

  $(".closeEditImageModalBtn").on("click", () => {
    $(".editImageModal").modal("hide");
  });

  $(".seeImage").click(function () {
    var index = $(".seeImage").index(this);
    const fileName = $(".imageName").eq(index).val();
    $(".editImageModal").modal("hide");
    $(".fullScreen.modalSelectImage").modal("show");
    $(".modalImage").html(`
    <img src=../images/${fileName}  />`);
  });

  $(".closeImage").click(function () {
    $(".fullScreen.modalSelectImage").modal("hide");
    $(".editImageModal").modal("show");
  });

  $(".selectImage").click(function () {
    var index = $(".selectImage").index(this);
    const fileName = $(".imageName").eq(index).val();
    const imageId = $(".imageId").eq(index).val();
    $(".previewEditImage").html(
      `<img src=../images/${fileName} class="max-h-72" />`
    );
    $(".image_id").val(imageId);
    $(".editImageModal").modal("hide");
  });

  $(".openEditImageModalBtn").on("click", () => {
    $.ajax({
      type: "GET",
      url: "/Core/getImages.php",
      success: function (data) {
        $("#allimages").empty();
        $("#allimages").append(data);
        $(".selectImageModal").modal("show");
        $(".ui.dimmable").dimmer({
          on: "hover",
        });
        $(".selectImage").click(function () {
          var index = $(".selectImage").index(this);
          const fileName = $(".imageName").eq(index).val();
          const imageId = $(".imageId").eq(index).val();
          $(".previewImage").html(
            `<img src=../images/${fileName} class="max-h-72" />`
          );
          $(".image_id").val(imageId);
          $(".selectImageModal").modal("hide");
        });

        $(".seeImage").click(function () {
          var index = $(".seeImage").index(this);
          const fileName = $(".imageName").eq(index).val();
          $(".selectImageModal").modal("hide");
          $(".fullScreen.modalSelectImage").modal("show");
          $("#modalImage").html(`     
    <img src=../images/${fileName}  />`);
        });
      },

      error: function (res) {
        alert("error");
      },
    });
    $(".selectImageModal").modal("show");
  });

  $("#submitNewImage").on("click", function () {
    var file = document.getElementById("file").files[0];
    var form_data = new FormData();
    form_data.append("file", file);
    $.ajax({
      type: "POST",
      url: "/Controllers/Admin/add/upload.php",
      data: form_data,
      contentType: false,
      cache: false,
      processData: false,
      success: function (data) {
        $(".newImageModal").modal("hide");
        $(".selectImageModal").modal("show");
        $("#allimages").prepend(data);
        $(".selectImageModal").modal("show");
        $(".ui.dimmable").dimmer({
          on: "hover",
        });
        $(".selectImage").click(function () {
          var index = $(".selectImage").index(this);
          const fileName = $(".imageName").eq(index).val();
          const imageId = $(".imageId").eq(index).val();
          $(".previewImage").html(
            `<img src=../images/${fileName} class="max-h-72" />`
          );
          $(".image_id").val(imageId);
          $(".selectImageModal").modal("hide");
        });

        $(".seeImage").click(function () {
          var index = $(".seeImage").index(this);
          const fileName = $(".imageName").eq(index).val();
          $(".selectImageModal").modal("hide");
          $(".fullScreen.modalSelectImage").modal("show");
          $("#modalImage").html(`     
    <img src=../images/${fileName}  />`);
        });
      },
      error: function (res) {
        alert("error");
      },
    });
  });

  $(".ui.dimmable").dimmer({
    on: "hover",
  });
});
