let allCoins = new Promise(function (resolve, reject) {
  const getResponse = async () => {
    return await fetch(
      "https://economia.awesomeapi.com.br/last/USD-BRL,EUR-BRL,BTC-BRL"
    )
      .then((res) => res.json())
      .then((res) => {
        return res;
      });
  };
  resolve(getResponse());
});

$(document).ready(() => {
  allCoins.then((coin) => {
    const USDBRLPctChangeColor =
      coin["USDBRL"]["pctChange"] > 0 ? "text-green-500" : "text-red-500";
    const EURBRLPctChangeColor =
      coin["EURBRL"]["pctChange"] > 0 ? "text-green-500" : "text-red-500";
    const BTCBRLPctChangeColor =
      coin["BTCBRL"]["pctChange"] > 0 ? "text-green-500" : "text-red-500";

    const dolar = `<span>Cotação Dólar - Real:</span><span class="${USDBRLPctChangeColor}">${coin["USDBRL"]["ask"]}</span>`;
    const euro = `<span>Cotação Dólar - Euro:</span><span class="${EURBRLPctChangeColor}">${coin["EURBRL"]["ask"]}</span>`;
    const bitcoin = `<span>Cotação Real - Bitcoin:</span><span class="${BTCBRLPctChangeColor}">${coin["BTCBRL"]["ask"]}</span>`;

    const coins = [dolar, euro, bitcoin];
    let currentStock = 0;

    function changeStock(index) {
      if (index < coins.length) {
        $("#stockHomeMobile").html(coins[index]);
        $("#stockPostMobile").html(coins[index]);
      } else if (index >= coins.length) {
        currentStock = 0;
        $("#stockHomeMobile").html(coins[0]);
        $("#stockPostMobile").html(coins[index]);
      }
    }
    const stockChangeInterval = 5000;

    setInterval(() => {
      currentStock++;
      changeStock(currentStock);
    }, stockChangeInterval);
  });

  //   const isWeekend = [0, 6].indexOf(new Date().getDay()) != -1;

  //   var timeNow = new Date().toLocaleString("pt-br", {
  //     hour: "numeric",
  //     minute: "numeric",
  //     hour12: false,
  //   });

  //   if (isWeekend) {
  //     $("#stock").addClass("hidden");
  //   } else {
  //     var stocksOpenAt = new Date();
  //     stocksOpenAt.setHours(9);
  //     stocksOpenAt.setMinutes(0);
  //     stocksOpenAt.setSeconds(0);
  //     var stocksCloseAt = new Date();
  //     stocksCloseAt.setHours(18);
  //     stocksCloseAt.setMinutes(0);
  //     stocksCloseAt.setSeconds(0);

  //     var isStocksWorking =
  //       new Date() > stocksOpenAt && new Date() < stocksCloseAt;
  //     if (!isStocksWorking) {
  //       $("#stock").addClass("hidden");
  //     }
  //   }
});
