const increaseFontBtn = document.querySelector("#increase-font");
let fontSize = localStorage.getItem("fontSize") || 14;

increaseFontBtn.addEventListener("click", () => {
  fontSize = parseInt(fontSize) + 2;
  document.querySelectorAll("body *").forEach(el => {
    el.style.fontSize = `${fontSize}px`;
  });
  localStorage.setItem("fontSize", fontSize);
});

const decreaseFontBtn = document.querySelector("#decrease-font");

decreaseFontBtn.addEventListener("click", () => {
  fontSize = parseInt(fontSize) - 2;
  document.querySelectorAll("body *").forEach(el => {
    el.style.fontSize = `${fontSize}px`;
  });
  localStorage.setItem("fontSize", fontSize);
});
const toggleButton = document.getElementById('grayscale-toggle');
const htmlTag = document.getElementsByTagName('html')[0];

function toggleGrayscale() {
  if (htmlTag.classList.contains('grayscale')) {
    htmlTag.classList.remove('grayscale');
    localStorage.setItem("grayscale", false);
  } else {
    htmlTag.classList.add('grayscale');
    localStorage.setItem("grayscale", true);
  }
}

// Toggle high contrast
function toggleHighContrast() {
    const body = document.body;
    body.classList.toggle('high-contrast');
    localStorage.setItem('highContrast', body.classList.contains('high-contrast'));
  }
  
  // Toggle negative contrast
  function toggleNegativeContrast() {
    const body = document.body;
    body.classList.toggle('negative-contrast');
    localStorage.setItem('negativeContrast', body.classList.contains('negative-contrast'));
  }
  

toggleButton.addEventListener('click', toggleGrayscale);

const lightBackgroundBtn = document.querySelector("#light-background");

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
    localStorage.setItem("lightBackground", false);
  } else {
    body.style.backgroundColor = "#ffffff";
    body.appendChild(whiteImage);
    localStorage.setItem("lightBackground", true);
  }
}

lightBackgroundBtn.addEventListener("click", toggleLightBackground);

const button = document.getElementById('high-contrast-button');

button.addEventListener('click', function() {
  document.body.classList.toggle('high-contrast');
  localStorage.setItem("highContrast", document.body.classList.contains('high-contrast'));
});

const buttons = document.getElementById('negative-contrast-button');
buttons.addEventListener('click', function() {
  document.body.classList.toggle('negative-contrast');
  localStorage.setItem("negativeContrast", document.body.classList.contains('negative-contrast'));
});

//text to speech
const checkbox = document.getElementById('text-speech');

function speakPageText(event) {
  let utterance = null;
  let hoveredElement = null;
  
  function speakText(text) {
    if (window.speechSynthesis && !window.speechSynthesis.speaking) {
      utterance = new SpeechSynthesisUtterance(text);
      window.speechSynthesis.speak(utterance);
    }
  }
  
  function stopSpeaking() {
    if (window.speechSynthesis && window.speechSynthesis.speaking) {
      window.speechSynthesis.cancel();
      utterance = null;
    }
  }
  
  function handleHover(event) {
    const target = event.target;
  
    if (target !== hoveredElement) {
      stopSpeaking();
  
      if (checkbox.checked) {
        const text = target.textContent;
        speakText(text);
      }
  
      hoveredElement = target;
    }
  }
  
  document.addEventListener('mouseover', handleHover);target = event.target;
  if (target.textContent.trim()) {
    const msg = new SpeechSynthesisUtterance(target.textContent);
    if (checkbox.checked) {
      window.speechSynthesis.speak(msg);
    } else {
      window.speechSynthesis.cancel();
    }
  }
}

checkbox.addEventListener("change", () => {
  if (checkbox.checked) {
    document.body.addEventListener("mouseover", speakPageText);
  } else {
    document.body.removeEventListener("mouseover", speakPageText);
    window.speechSynthesis.cancel();
  }
  localStorage.setItem("textSpeech", checkbox.checked);
});


const resetButton = document.querySelector("#reset-button");
resetButton.addEventListener('click', function() {
  // Reset font size
  fontSize = 14;
  document.querySelectorAll("body *").forEach(el => {
    el.style.fontSize = "";
  });
  localStorage.setItem("fontSize", fontSize);

  // Reset grayscale
  if (localStorage.getItem("grayscale") === "true") {
    toggleGrayscale();
  }
  localStorage.setItem("grayscale", false);

  // Reset light background
  if (localStorage.getItem("lightBackground") === "true") {
    toggleLightBackground();
  }
  localStorage.setItem("lightBackground", false);

  // Reset high contrast
  if (localStorage.getItem("highContrast") === "true") {
    toggleHighContrast();
  }
  localStorage.setItem("highContrast", false);

  // Reset negative contrast
  if (localStorage.getItem("negativeContrast") === "true") {
    toggleNegativeContrast();
  }
  localStorage.setItem("negativeContrast", false);

  if (localStorage.getItem("text-speech") === "true") {
    const checkbox = document.getElementById('text-speech');
    checkbox.checked = true;
    speakPageText();
  }
  localStorage.setItem("text-speech", false);

  // Reset toggle buttons
  increaseFontBtn.checked = false;
  decreaseFontBtn.checked = false;
  toggleButton.checked = false;
  lightBackgroundBtn.checked = false;
  button.checked = false;
  buttons.checked = false;
  checkbox.checked = false;

});

