$(document).ready(() => {
  $(".addPostComputer").validate({
    ignore: "",
    rules: {
      title: {
        required: true,
        maxlength: 60,
      },
      post_at: "required",
      image_id: "required",
      content: "required",
    },
    messages: {
      title:
        "<p class='text-red-500'>Escolha um título de até 60 caracteres</p>",
      post_at: "<p class='text-red-500'>Escolha uma data</p>",
      image_id: "<p class='text-red-500'>Escolha uma thumb</p>",
      content: "<p class='text-red-500'>Conteúdo Obrigatório</p>",
    },
    submitHandler: function (form) {
      form.submit();
    },
  });

  $(".addPostMobile").validate({
    ignore: "",
    rules: {
      title: {
        required: true,
        maxlength: 60,
      },
      post_at: "required",
      image_id: "required",
      content: "required",
    },
    messages: {
      title:
        "<p class='text-red-500'>Escolha um título de até 60 caracteres</p>",
      post_at: "<p class='text-red-500'>Escolha uma data</p>",
      image_id: "<p class='text-red-500'>Escolha uma thumb</p>",
      content: "<p class='text-red-500'>Conteúdo Obrigatório</p>",
    },
    submitHandler: function (form) {
      form.submit();
    },
  });

  $(".editpostComputer").validate({
    ignore: "",
    rules: {
      title: {
        required: true,
        maxlength: 60,
      },
      post_at: "required",
      image_id: "required",
      content: "required",
    },

    messages: {
      title:
        "<p class='text-red-500'>Escolha um título de até 60 caracteres</p>",
      adFile: "<p class='text-red-500'>Escolha uma data</p>",
      image_id: "<p class='text-red-500'>Escolha uma thumb</p>",
      content: "<p class='text-red-500'>Conteúdo Obrigatório</p>",
    },
    submitHandler: function (form) {
      form.submit();
    },
  });

  $(".editpostMobile").validate({
    ignore: "",
    rules: {
      title: {
        required: true,
        maxlength: 60,
      },
      post_at: "required",
      image_id: "required",
      content: "required",
    },

    messages: {
      title:
        "<p class='text-red-500'>Escolha um título de até 60 caracteres</p>",
      adFile: "<p class='text-red-500'>Escolha uma data</p>",
      image_id: "<p class='text-red-500'>Escolha uma thumb</p>",
      content: "<p class='text-red-500'>Conteúdo Obrigatório</p>",
    },
    submitHandler: function (form) {
      form.submit();
    },
  });

  $(".newAd").validate({
    ignore: "",
    rules: {
      adName: "required",
      adFile: "required",
      adLink: "required",
      adStarts_at: "required",
      adFinishs_at: "required",
    },

    messages: {
      adName: "<p class='text-red-500'>Escolha um título</p>",
      adFile: "<p class='text-red-500'>Selecione uma foto</p>",
      adLink: "<p class='text-red-500'>Digite o link</p>",
      adStarts_at: "<p class='text-red-500'>Selecione a hora inicial</p>",
      adFinishs_at: "<p class='text-red-500'>Selecione a hora final</p>",
    },
    submitHandler: function (form) {
      form.submit();
    },
  });

  $(".updateAd").validate({
    ignore: "",
    rules: {
      adName: "required",
      adLink: "required",
      adStarts_at: "required",
      adFinishs_at: "required",
    },

    messages: {
      adName: "<p class='text-red-500'>Escolha um título</p>",
      adLink: "<p class='text-red-500'>Digite o link</p>",
      adStarts_at: "<p class='text-red-500'>Selecione a hora inicial</p>",
      adFinishs_at: "<p class='text-red-500'>Selecione a hora final</p>",
    },
    submitHandler: function (form) {
      form.submit();
    },
  });
});
