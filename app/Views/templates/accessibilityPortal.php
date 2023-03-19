
<body class="animate__animated animate__fadeIn">
      <div class="dropdown">
         <button href="#accessibilityModal" data-bs-toggle="modal" class="accessButton floating-btn" type="button">
         <b>Accessibility</b>
         </button>
      </div>

      <div id="accessibilityModal" class="modal fade">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title">Accessibility Features</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
               </div>
               <div class="modal-body">
                  <button class="btn btn-outline-secondary" id="increase-font"><i
                     class="fa fa-plus "></i> Increase Font Size</button>
                  <button class="btn btn-outline-secondary" id="decrease-font"><i
                     class="fa fa-minus "></i> Decrease Font Size</button>
                  <hr>
                  <div class="form-check form-switch">
                     <input class="form-check-input" type="checkbox" id="negative-contrast-button">
                     <label class="form-check-label" for="negative-contrast-button">
                     Negative Contrast
                     </label>
                  </div>
                  <div class="form-check form-switch">
                     <input class="form-check-input" type="checkbox" id="high-contrast-button">
                     <label class="form-check-label" for="high-contrast-button">
                     High Contrast
                     </label>
                  </div>
                  <hr>
                  <div class="form-check form-switch">
                     <input class="form-check-input" type="checkbox" id="grayscale-toggle">
                     <label class="form-check-label" for="grayscale-toggle">
                     Toggle Greyscale
                     </label>
                  </div>
                  <div class="form-check form-switch">
                     <input class="form-check-input" type="checkbox" id="light-background">
                     <label class="form-check-label" for="light-background">
                     Light Background
                     </label>
                  </div>
               </div>
               <div class="modal-footer">
                  <button class="btn btn-secondary" id="reset-button">Reset</button>
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
               </div>
            </div>
         </div>
      </div>

      <script>
            const increaseFontBtn = document.querySelector("#increase-font");
let fontSize = getFontSizeCookie() || 14;

increaseFontBtn.addEventListener("click", () => {
  fontSize += 2;
  document.querySelectorAll("body *").forEach(el => {
    el.style.fontSize = `${fontSize}px`;
  });
  setFontSizeCookie(fontSize);
});

const decreaseFontBtn = document.querySelector("#decrease-font");

decreaseFontBtn.addEventListener("click", () => {
  fontSize -= 2;
  document.querySelectorAll("body *").forEach(el => {
    el.style.fontSize = `${fontSize}px`;
  });
  setFontSizeCookie(fontSize);
});

const toggleButton = document.getElementById('grayscale-toggle');
const htmlTag = document.getElementsByTagName('html')[0];

toggleButton.addEventListener('click', () => {
  toggleGrayscale();
  setGrayscaleCookie(htmlTag.classList.contains('grayscale'));
});

function toggleGrayscale() {
  if (htmlTag.classList.contains('grayscale')) {
    htmlTag.classList.remove('grayscale');
  } else {
    htmlTag.classList.add('grayscale');
  }
}

const lightBackgroundBtn = document.querySelector("#light-background");

lightBackgroundBtn.addEventListener("click", () => {
  toggleLightBackground();
  setLightBackgroundCookie(document.querySelector("body").style.backgroundColor === "#ffffff");
});

function toggleLightBackground() {
  const body = document.querySelector("body");
  const whiteImage = document.createElement("img");
  whiteImage.setAttribute("src", "assets/img/whitebackground.jpg");
  whiteImage.setAttribute("id", "white-image");

  if (body.style.backgroundColor) {
    body.style.backgroundColor = "";
    const existingImage = document.querySelector("#white-image");
    if (existingImage) {
      existingImage.remove();
    }
  } else {
    body.style.backgroundColor = "#ffffff";
    body.appendChild(whiteImage);
  }
}

const highContrastBtn = document.getElementById('high-contrast-button');
highContrastBtn.addEventListener('click', () => {
  document.body.classList.toggle('high-contrast');
  setHighContrastCookie(document.body.classList.contains('high-contrast'));
});

const negativeContrastBtn = document.getElementById('negative-contrast-button');
negativeContrastBtn.addEventListener('click', () => {
  document.body.classList.toggle('negative-contrast');
  setNegativeContrastCookie(document.body.classList.contains('negative-contrast'));
});

const resetButton = document.getElementById('reset-button');
resetButton.addEventListener('click', () => {
  resetPreferences();
});

function resetPreferences() {
  // Reset font size
  fontSize = 14;
  document.querySelectorAll("body *").forEach(el => {
    el.style.fontSize = "";
  });
  setFontSizeCookie(fontSize);

  // Reset grayscale
  htmlTag.classList.remove('grayscale');
  setGrayscaleCookie(false);

  // Reset light background
  document.querySelector("body").style.backgroundColor = "";
  const existingImage = document.querySelector("#white-image");
  if (existingImage) {
    existingImage.remove();
  }
  setLightBackgroundCookie(false);

  // Reset high contrast
  document.body.classList.remove('high-contrast');
  setHighContrastCookie(false);

  // Reset negative contrast
  document.body.classList.remove('negative-contrast');
  setNegativeContrastCookie(false);

  // Reset toggle buttons
  decreaseFontBtn.checked = false;
  toggleButton.checked = false;
  lightBackgroundBtn.checked = false;
  highContrastBtn.checked = false;
  negativeContrastBtn.checked = false;
}

function setFontSizeCookie(fontSize) {
  document.cookie = "fontSize=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
  document.cookie = "grayscale=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
  document.cookie = "lightBackground=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
  document.cookie = "highContrast=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
  document.cookie = "negativeContrast=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
}

</script>






