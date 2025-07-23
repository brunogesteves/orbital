$(document).ready(() => {
  $("#resumeFront").hide();
  $("#stopFront").hide();
  $("#pauseFront").hide();
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
      $("#playFront").show();
      $("#stopFront").hide();
      $("#pauseFront").hide();
      $("#resumeFront").hide();
      speechSynthesis.cancel();
    }
  }

  function toSpeak() {
    let textContent = $("#textToSpeechFront")
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

  $("#playFront").click(function (e) {
    speechSynthesis.cancel();
    $("#stopFront").show();
    $("#pauseFront").show();
    $("#playFront").hide();

    e.preventDefault();
    let textContent = $("#textToSpeechFront")
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
