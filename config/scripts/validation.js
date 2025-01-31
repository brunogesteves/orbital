$(document).ready(() => {
  $("#updateLogotypeForm").validate({
    ignore: "",
    rules: {
      newLogotypeImage: "required",
    },
    messages: {
      newLogotypeImage: "<p class='text-white'>Escolha uma imagem</p>",
    },
    submitHandler: function (form) {
      form.submit();
    },
  });

  $("#postform").validate({
    ignore: "",
    rules: {
      title: {
        required: true,
        maxlength: 60,
      },
      post_at: "required",
      image_id: "required",
      content: "required",
      section: "required",
    },
    messages: {
      title:
        "<p class='text-red-500'>Escolha um título de até 60 caracteres</p>",
      post_at: "<p class='text-red-500'>Escolha uma data</p>",
      image_id: "<p class='text-red-500'>Escolha uma thumb</p>",
      content: "<p class='text-red-500'>Conteúdo Obrigatório</p>",
      section: "<p class='text-red-500'>Escolha uma Posição</p>",
    },
    submitHandler: function (form) {
      form.submit();
    },
  });

  $("#adForm").validate({
    ignore: "",
    rules: {
      title: "required",
      link: {
        required: true,
        url: true,
      },
      position: "required",
      image: "required",
      startsAt: "required",
      endsAt: "required",
    },

    messages: {
      title: "<p class='text-red-500'>Escolha um título</p>",
      link: "<p class='text-red-500'>Digite o link</p>",
      image: "<p class='text-red-500'>Selecione uma foto</p>",
      position: "<p class='text-red-500'>Selecione uma Posição</p>",
      startsAt: "<p class='text-red-500'>Selecione a hora inicial</p>",
      endsAt: "<p class='text-red-500'>Selecione a hora final</p>",
    },
    submitHandler: function (form) {
      form.submit();
    },
  });

  $("#loginForm").validate({
    ignore: "",
    rules: {
      email: {
        required: true,
        email: true,
      },
      password: "required",
    },

    messages: {
      email: "<p class='text-red-500'>Escolha um título</p>",
      password: "<p class='text-red-500'>Digite o link</p>",
    },
    submitHandler: function (form) {
      form.submit();
    },
  });
});
