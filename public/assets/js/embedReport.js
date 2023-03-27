// api.js
(function () {
    const scriptTag = document.currentScript;
    const API_KEY = scriptTag.getAttribute("api-key");
    const API_URL = "http://localhost:8080/embedApi";
    console.log(API_KEY)
  
    const createPopup = (content) => {
      const popupWrapper = document.createElement("div");
      popupWrapper.style.position = "fixed";
      popupWrapper.style.top = "0";
      popupWrapper.style.left = "0";
      popupWrapper.style.width = "100%";
      popupWrapper.style.height = "100%";
      popupWrapper.style.backgroundColor = "rgba(0,0,0,0.5)";
      popupWrapper.style.display = "flex";
      popupWrapper.style.justifyContent = "center";
      popupWrapper.style.alignItems = "center";
      popupWrapper.style.zIndex = "1000";
  
      const popup = document.createElement("div");
      popup.style.backgroundColor = "white";
      popup.style.border = "1px solid #ccc";
      popup.style.padding = "20px";
      popup.style.borderRadius = "4px";
      popup.innerHTML = content;
      popupWrapper.appendChild(popup);
  
      popupWrapper.addEventListener("click", (e) => {
        if (e.target === popupWrapper) {
          popupWrapper.remove();
        }
      });
  
      document.body.appendChild(popupWrapper);
    };
  
    const createTable = (data) => {
      let tableContent = "<table border='1' cellspacing='0' cellpadding='5'>";
      for (const category in data.categories) {
        tableContent += `<tr><th colspan='2'>${category}</th></tr>`;
        for (const questionObj of data.categories[category].questions) {
          tableContent += `<tr><td>${questionObj.question}</td><td>${questionObj.response}</td></tr>`;
        }
      }
      tableContent += "</table>";
      return tableContent;
    };
  
    const fetchData = async () => {
      const response = await fetch(API_URL, {
        headers: {
          "api-key": API_KEY,
        },
        mode: 'cors'
      });
      const data = await response.json();
      return data;
    };
  
    const createButton = () => {
      const button = document.createElement("button");
      button.textContent = "Show Audit";
      button.style.position = "fixed";
      button.style.right = "20px";
      button.style.bottom = "20px";
      button.style.zIndex = "1000";
      document.body.appendChild(button);
      return button;
    };
  
    const init = async () => {
      const data = await fetchData();
      const tableContent = createTable(data);
      const button = createButton();
      button.addEventListener("click", () => {
        createPopup(tableContent);
      });
    };
  
    init();
  })();
  