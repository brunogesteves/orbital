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
  $("#resumeMobile").hide();
  $("#stopMobile").hide();
  $("#pauseMobile").hide();
  $("#resumeFront").hide();
  $("#stopFront").hide();
  $("#pauseFront").hide();

  let wholeText = [];
  currentPosition = 0;

  "speechSynthesis" in window;

  function toStop() {
    if (currentPosition < wholeText.length) {
      currentPosition++;
      toSpeak();
    } else {
      $("#playMobile").show();
      $("#stopMobile").hide();
      $("#pauseMobile").hide();
      $("#resumeMobile").hide();
      speechSynthesis.cancel();
    }
  }

  function toSpeak() {
    let textContent = $("#textToSpeechMobile")
      .text()
      .replace(/^\s+|\s+$/gm, "");
    allVoicesObtained.then(async (voice) => {
      const textContentToSpeak = new SpeechSynthesisUtterance(textContent);

      textContentToSpeak.voice = voice[14];
      speechSynthesis.speak(textContentToSpeak);

      textContentToSpeak.onend = (event) => {
        toStop();
      };
    });
  }

  $("#playMobile").click(function (e) {
    speechSynthesis.cancel();
    $("#stopMobile").show();
    $("#pauseMobile").show();
    $("#playMobile").hide();

    e.preventDefault();
    let textContent = $("#textToSpeechMobile")
      .text()
      .replace(/^\s+|\s+$/gm, "");

    const splitTextContent = textContent.split(" ");

    const perChunk = 10; // items per chunk

    const result = splitTextContent.reduce((resultArray, item, index) => {
      const chunkIndex = Math.floor(index / perChunk);

      if (!resultArray[chunkIndex]) {
        resultArray[chunkIndex] = []; // start a new chunk
      }

      resultArray[chunkIndex].push(item);
      return resultArray;
    }, []);
    wholeText = result;
    toSpeak();
  });

  $("#resumeMobile").click(function () {
    speechSynthesis.resume();
    $("#pauseMobile").show();
    $("#resumeMobile").hide();
  });
  $("#pauseMobile").click(function () {
    speechSynthesis.pause();
    $("#pauseMobile").hide();
    $("#resumeMobile").show();
  });
  $("#stopMobile").click(function () {
    speechSynthesis.cancel();
    $("#playMobile").show();
    $("#stopMobile").hide();
    $("#pauseMobile").hide();
    $("#resumeMobile").hide();
  });
});
