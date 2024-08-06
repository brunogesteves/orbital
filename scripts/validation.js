$(document).ready(() => {
  $("form[name='addpost']").validate({
    ignore: "",
    rules: {
      title: "required",
      post_at: "required",

      image_id: "required",
      content: "required",
    },
    // Specify validation error messages
    messages: {
      title: "<p class='text-red-500'>Escolha um título</p>",
      post_at: "<p class='text-red-500'>Escolha uma data</p>",

      image_id: "<p class='text-red-500'>Escolha uma thumb</p>",
      content: "<p class='text-red-500'>Conteúdo Obrigatório</p>",
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function (form) {
      form.submit();
    },
  });

  $(".editpost").validate({
    ignore: "",
    rules: {
      title: "required",
      post_at: "required",

      image_id: "required",
      content: "required",
    },
    // Specify validation error messages
    messages: {
      title: "<p class='text-red-500'>Escolha um título</p>",
      post_at: "<p class='text-red-500'>Escolha uma data</p>",

      image_id: "<p class='text-red-500'>Escolha uma thumb</p>",
      content: "<p class='text-red-500'>Conteúdo Obrigatório</p>",
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function (form) {
      form.submit();
    },
  });
});
