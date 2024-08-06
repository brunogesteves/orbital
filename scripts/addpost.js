$(document).ready(() => {
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
        imageGalleryUrl: "http://orbitaltv.net/Components/gallery.php",
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
    $(".addImageModal").modal("show");
  });

  $(".closeAddImageModalBtn").on("click", () => {
    $(".addImageModal").modal("hide");
  });

  $(".seeImage").click(function () {
    var index = $(".seeImage").index(this);
    console.log(index);
    const fileName = $(".imageName").eq(index).val();
    $(".addImageModal").modal("hide");
    $(".fullScreen.modalSelectImage").modal("show");
    $("#modalImage").html(`     
    <img src=../images/${fileName}  />`);
  });

  $(".selectImage").click(function () {
    var index = $(".selectImage").index(this);
    const fileName = $(".imageName").eq(index).val();
    const imageId = $(".imageId").eq(index).val();
    $(".previewImage").html(
      `<img src=../images/${fileName} class="max-h-72" />`
    );
    $(".image_id").val(imageId);
    $(".addImageModal").modal("hide");
  });

  $(".closeImage").click(function () {
    $("#imageModal").modal("hide");
    $(".fullScreen.modalSelectImage").modal("hide");
    $(".addImageModal").modal("show");
  });

  $("#menu_mobile_open").on("click", function () {
    $(".ui.sidebar").sidebar("toggle");
  });
  $("#menu_tablet_open").on("click", function () {
    $(".ui.sidebar").sidebar("toggle");
  });

  $(".ui.dimmable").dimmer({
    on: "hover",
  });
});
