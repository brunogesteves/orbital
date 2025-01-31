let allVoicesObtained = new Promise(function (resolve, reject) {
  let voices = window.speechSynthesis.getVoices();
  if (voices.length !== 0) {
    resolve(voices);
  } else {
    window.speechSynthesis.addEventListener("voiceschanged", function () {
      voices = window.speechSynthesis.getVoices();
      resolve(voices);
    });
  }
});

$(document).ready(() => {
  const img = document.getElementsByTagName("img");

  for (let i = 0; i < img.length; i++) {
    $("img")
      .eq(i)
      .on("error", function () {
        $(this).attr(
          "src",
          "https://orbitaltv.net/images/orbital/imageerror.png"
        );
      })
      .attr("src", img[i].src);
  }

  speechSynthesis.cancel();

  $("#resumeFront").hide();
  $("#stopFront").hide();
  $("#pauseFront").hide();

  "speechSynthesis" in window;

  function toStop() {
    $("#playFront").show();
    $("#stopFront").hide();
    $("#pauseFront").hide();
    $("#resumeFront").hide();
    speechSynthesis.cancel();
  }

  function selectSpeak(textPart, textSplitted) {
    if (textPart < textSplitted.length) {
      toSpeak(textPart, textSplitted);
    } else {
      toStop();
    }
  }

  function toSpeak(textPart, textSplitted) {
    allVoicesObtained.then(async (voice) => {
      const textContentToSpeak = new SpeechSynthesisUtterance(
        textSplitted[textPart].toString().replaceAll(",", " ")
      );
      textContentToSpeak.voice = voice[14];
      speechSynthesis.speak(textContentToSpeak);
      textContentToSpeak.onend = (event) => {
        selectSpeak(textPart++, textSplitted);
      };
    });
  }

  $("#playFront").click(function (e) {
    speechSynthesis.cancel();
    $("#stopFront").show();
    $("#pauseFront").show();
    $("#playFront").hide();

    e.preventDefault();
    let textContent = $("#textToSpeechFront").text().trim();
    const textSplitted = [];

    const words = textContent.split(" ");

    let currentChunk = "";

    for (let word of words) {
      if ((currentChunk + word).length <= 400) {
        currentChunk += (currentChunk ? " " : "") + word;
      } else {
        textSplitted.push(currentChunk);
        currentChunk = word;
      }
    }

    selectSpeak(0, textSplitted);
  });

  $("#resumeFront").click(function () {
    speechSynthesis.resume();
    $("#pauseFront").show();
    $("#resumeFront").hide();
  });
  $("#pauseFront").click(function () {
    speechSynthesis.pause();
    $("#pauseFront").hide();
    $("#resumeFront").show();
  });
  $("#stopFront").click(function () {
    speechSynthesis.cancel();
    $("#playFront").show();
    $("#stopFront").hide();
    $("#pauseFront").hide();
    $("#resumeFront").hide();
  });
});
