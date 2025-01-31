$(document).ready(() => {
  const schedule = new Date($("#oldPost_at").val() * 1000)
    .toISOString()
    .substring(0, 16);

  $("#post_at").val(schedule);

  $("#fileImageUpload").on("change", function () {
    if (typeof FileReader != "undefined") {
      $("#previewInputImage").empty();

      var reader = new FileReader();
      reader.onload = function (e) {
        $("#previewInputImage").html(
          `<img src=${e.target.result} class="thumb-image w-48 max-[768px]:w-full max-[768px]:mt-2 " />`
        );
      };
      $("#previewInputImage").show();
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
            "codeView",
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
    };
    editor.setContents($(".content").val());
  }

  $("#openDialogSelectImage").click(() => {
    document.getElementById("dialogChooseImage").showModal();
  });

  $("#closeDialogSeeImage").click(() => {
    document.getElementById("dialogChooseImage").close();
  });

  $(".selectImage").click(function () {
    var selectImage = $(".selectImage");
    var index = $(".selectImage").index(this);

    var fileName = selectImage[index].getAttribute("data-image");
    var id = selectImage[index].getAttribute("data-id");
    $("#previewImage").html(
      `<img src="../public/images/${fileName}" alt=${fileName} />`
    );
    document.getElementById("dialogChooseImage").close();
    $("#image_id").val(id);
    $("#oldImage").remove();
  });

  $("#submitNewImage").on("click", function () {
    var fileInput = $("#fileImageUpload")[0];

    var formData = new FormData();
    formData.append("fileImageUpload", fileInput.files[0]);

    $.ajax({
      type: "POST",
      url: "/Core/upload.php",
      data: formData,
      contentType: false,
      cache: false,
      processData: false,
      success: function (data) {
        console.log(data);
        $(".allimages").prepend(data);
        $(".selectImage").click(function () {
          var selectImage = $(".selectImage");
          var index = $(".selectImage").index(this);

          var fileName = selectImage[index].getAttribute("data-image");
          var id = selectImage[index].getAttribute("data-id");
          $("#previewImage").html(
            `<img src="../public/images/${fileName}" alt=${fileName} />`
          );
          document.getElementById("dialogChooseImage").close();
          $("#image_id").val(id);
          $("#oldImage").remove();
          $("#previewInputImage").empty();
        });
      },
      error: function (res) {
        alert("error");
      },
    });
  });
});
