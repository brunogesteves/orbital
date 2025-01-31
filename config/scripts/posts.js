$(document).ready(() => {
  $(".openModalBtn").click(function () {
    var index = $(".openModalBtn").index(this);

    const image = $(".image")
      .eq(index + 1)
      .val();
    const title = $(".title").eq(index).text().trim();
    const source = $(".source").eq(index).text().trim();
    const author = $(".nameAuthor").eq(index).text().trim();
    const section = $(".section").eq(index).text().trim();
    const post_at = $(".startsAt").eq(index).text().trim();
    const status = $(".status").eq(index).text().trim();
    const content = $(".postContent").eq(index).val();
    const postId = $(".postId").eq(index).val();
    $("#modalAreaTitle").text(title);
    $("#modalAreaSource").text(source);
    $("#modalAuthorName").text(author);
    $("#modalAreaSection").text(section);
    $("#modalAreaStatus").text(status);
    $("#modalAreaContent").html(content);

    console.log(index);

    const newHour =
      post_at[6] +
      post_at[7] +
      post_at[8] +
      post_at[9] +
      post_at[5] +
      post_at[3] +
      post_at[4] +
      post_at[5] +
      post_at[0] +
      post_at[1] +
      "T" +
      post_at[11] +
      post_at[12] +
      ":" +
      post_at[14] +
      post_at[15];

    if (source == "Orbital Channel") {
      $("#modalAreaThumb").html(
        `<img src=../images/${image} alt="image" class="w-full "/>`
      );

      $("#editPostPublish").html(`      
        <div class="flex justify-center items-center gap-x-3">
          <a href='/admin/editar?id=${Number(postId)}'
              class="bg-blue-600 hover:bg-blue-700 px-3 py-1 rounded text-white cursor-pointer hover:text-white">
                  Editar
           </a>      
           <form method="post" action="admin/update">
                <input type="hidden" name="UpdateStatusId" value=${postId} />
                <input type="hidden" name="UpdateStatus" value=${
                  status == "Publicado" ? "off" : "on"
                }  />
                <button type="submit" name="_method" value="put"
                    class="bg-blue-600 hover:bg-blue-700 px-3 py-1 rounded text-white cursor-pointer">
                    ${status == "Publicado" ? "Despublicar" : "Publicar"} 
                </button>
            </form>   
        </div>   
      `);
    } else if (source !== "Orbital Channel") {
      $("#modalAreaThumb").html(
        `<img src=${image} alt="image" class="w-full "/>`
      );
      $("#editPostPublish").html(`
          <form method="post" action="admin/update">
              <input type="hidden" name="statusChangeExtPostStatusId" value=${postId} />
              <input type="hidden" name="statusChangeExtPostStatus" value=${
                status == "Publicado" ? "off" : "on"
              }  />
              <button type="submit" name="_method" value="put"
                  class="bg-blue-600 hover:bg-blue-700 px-3 py-1 rounded text-white cursor-pointer ">
                  ${status == "Publicado" ? "Despublicar" : "Publicar"} 
              </button>
          </form>

          <form id="changeSection" method="post" action="admin/update">
                <select class="rounded-md border border-black" name="sectionUpdateExtPost">
                    <option value="n1">n1</option>
                    <option value="n2">n2</option>
                    <option value="n3">n3</option>
                    <option value="n4">n4</option>
                </select>	
                <input type="hidden" name="sectionUpdateExtPostId" value=${postId} />                
                <button type="submit" name="_method" value="put"
                  class="bg-blue-600 hover:bg-blue-700 px-3 py-1 ml-1 mr-3 rounded text-white cursor-pointer">
                  Atualizar seção
                </button>
          </form>          
          <form method="post" action="admin/update" class="max-[425px]:flex max-[425px]:flex-col max-[425px]:justify-center max-[425px]:gap-y-2">
                <input type="hidden" name="updateHourExtPostId" value=${postId} />
                <input id="exPostUpdateHour" type="datetime-local" name="updateHourExtPost" min=${new Date()
                  .toISOString()
                  .slice(0, 16)} />
                <button  type="submit" name="_method" value="put"
                  class="bg-blue-600 hover:bg-blue-700 px-3 py-1 rounded text-white cursor-pointer">
                  Atualizar Horário
                </button>
          </form>          
      `);
      $("#changeSection select").val(section);
      $("#exPostUpdateHour").val(newHour);
      $("#exPostUpdateHour").prop(
        "disabled",
        new Date(newHour) < new Date() == true ? "disabled" : ""
      );
    }

    $(".fullscreen.modalArea").modal("toggle");
  });

  $("#closeModalBtn").on("click", function () {
    $(".fullscreen.modalArea").modal("toggle");
  });

  $("#authorSelect").change(() => {
    const user = $("#authorSelect").val().trim().toLowerCase();

    var postsArea = $(".postsArea");
    for (let index = 0; index < postsArea.length; index++) {
      var authorName = $(`.postsArea`)
        .eq(index)
        .children("p")
        .eq(2)
        .text()
        .trim()
        .toLowerCase();
      if (authorName != user) {
        $(".postsArea").eq(index).addClass("hidden");
      } else {
        $(".postsArea").eq(index).removeClass("hidden");
      }
    }
  });

  $("#authorSelectMobile").change(() => {
    const user = $("#authorSelectMobile").val().trim().toLowerCase();

    var mobilePostsArea = $(".mobilePostsArea");
    for (let index = 0; index < mobilePostsArea.length; index++) {
      var authorName = $(`.mobilePostsArea`)
        .eq(index)
        .children("p")
        .eq(2)
        .text()
        .trim()
        .toLowerCase();
      if (authorName != user) {
        $(".mobilePostsArea").eq(index).addClass("hidden");
      } else {
        $(".mobilePostsArea").eq(index).removeClass("hidden");
      }
    }
  });

  $(".menu .item").tab();

  const tabs = [
    "mobilePosts",
    "mobileExternal",
    "mobileN1",
    "mobileN2",
    "mobileN3",
    "mobileN4",
    "mobileAutomaticos",
  ];
  $(".selectTab").change(function (e) {
    for (let index = 0; index < tabs.length; index++) {
      if (tabs[index] == e.target.value) {
        $(`#${tabs[index]}`).removeClass("hidden");
      } else {
        $(`#${tabs[index]}`).addClass("hidden");
      }
    }
  });

  var fixmeTop = $(".selectTab").offset().top;

  $(window).scroll(function () {
    var currentScroll = $(window).scrollTop();

    if (currentScroll >= fixmeTop) {
      $(".selectTab").css({
        position: "fixed",
        top: "0",
        left: "0",
      });
    } else {
      $(".selectTab").css({
        position: "absolute",
      });
    }
  });
});
