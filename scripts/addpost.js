$(document).ready(() => {
  $("#file").on("change", function () {
    if (typeof FileReader != "undefined") {
      var previewInputImage = $("#previewInputImage");
      previewInputImage.empty();

      var reader = new FileReader();
      reader.onload = function (e) {
        $(".previewInputImage").html(
          `<img src=${e.target.result} class="thumb-image w-auto max-[425px]:w-full " />`
        );
      };
      previewInputImage.show();
      reader.readAsDataURL($(this)[0].files[0]);
    }
  });

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
            //   "codeView",
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
      $(".oldContent").val(contents);
    };

    editor.setContents($(".oldContent").val());
  }

  $(".openAddImageModalBtn").on("click", () => {
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

  $(".closeAddImageModalBtn").on("click", () => {
    $(".selectImageModal").modal("hide");
  });

  $(".modalSelectImageCloseBtn").click(function () {
    $(".selectImageModal").modal("show");
  });

  $("#menu_mobile_open").on("click", function () {
    $(".ui.sidebar").sidebar("toggle");
  });
  $("#menu_tablet_open").on("click", function () {
    $(".ui.sidebar").sidebar("toggle");
  });

  $("#addNewImageBtn").click(function () {
    $(".selectImageModal").modal("hide");
    $(".newImageModal").modal("show");
  });

  $("#submitNewImage").on("click", function () {
    var file = document.getElementById("file").files[0];
    var form_data = new FormData();
    form_data.append("image", file);
    $.ajax({
      type: "POST",
      url: "/Core/upload.php",
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
