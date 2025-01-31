let saopaulo = new Promise(function (resolve, reject) {
  const getResponse = async () => {
    return await fetch(
      "https://weather.visualcrossing.com/VisualCrossingWebServices/rest/services/timeline/S%C3%A3o%20Paulo?unitGroup=metric&include=current&key=HML6BSRSSPYNUVYTH2PFBBK7W&contentType=json",
      {
        method: "GET",
        headers: {},
      }
    )
      .then((res) => res.json())
      .then((response) => {
        return {
          address: response.address,
          conditions: response.currentConditions,
        };
      });
  };
  resolve(getResponse());
});
let santos = new Promise(function (resolve, reject) {
  const getResponse = async () => {
    return await fetch(
      "https://weather.visualcrossing.com/VisualCrossingWebServices/rest/services/timeline/santos?unitGroup=metric&include=current&key=HML6BSRSSPYNUVYTH2PFBBK7W&contentType=json",
      {
        method: "GET",
        headers: {},
      }
    )
      .then((res) => res.json())
      .then((response) => {
        return {
          address: response.address,
          conditions: response.currentConditions,
        };
      });
  };
  resolve(getResponse());
});
let brasilia = new Promise(function (resolve, reject) {
  const getResponse = async () => {
    return await fetch(
      "https://weather.visualcrossing.com/VisualCrossingWebServices/rest/services/timeline/Bras%C3%ADlia?unitGroup=metric&include=current&key=HML6BSRSSPYNUVYTH2PFBBK7W&contentType=json",
      {
        method: "GET",
        headers: {},
      }
    )
      .then((res) => res.json())
      .then((response) => {
        return {
          address: response.address,
          conditions: response.currentConditions,
        };
      });
  };
  resolve(getResponse());
});

$(document).ready(() => {
  Promise.all([saopaulo, santos, brasilia]).then((results) => {
    let currentforeCast = 0;

    function changeCity(index) {
      if (index < results.length) {
        currentforeCast = index;

        $("#forecast").html(`
        <div class="flex flex-col items-center w-full">
          <span>${
            results[currentforeCast]?.address.charAt(0).toUpperCase() +
            results[currentforeCast]?.address.slice(1)
          }</span>
          <div class="flex items-center gap-x-3 h-6">
            <img src=public/images/icons/${
              results[currentforeCast].conditions.icon
            }.png alt="" width=30 />
            <span >${Math.round(
              results[currentforeCast].conditions.temp
            )}°</span>
          </div>
        </div>
      `);
      } else if (index >= results.length) {
        currentforeCast = 0;

        $("#forecast").html(`
        <div class="flex flex-col items-center w-full ">
          <span class="text-xl ">${
            results[0]?.address.charAt(0).toUpperCase() +
            results[0]?.address.slice(1)
          }</span>
          <div class="flex items-center gap-x-3 h-6">
            <img src=public/images/icons/${
              results[0]?.conditions?.icon
            }.png alt="" width=30/>
            <span class="text-xl ">${Math.round(
              results[0].conditions.temp
            )}°</span>
          </div>
        </div>
      `);
      }
    }

    setInterval(() => {
      currentforeCast++;
      changeCity(currentforeCast);
    }, 4000);
  });
});
