// Get the current font size from localStorage, or use a default value
let fontSize = localStorage.getItem('fontSize') || 16;

// Set the font size of the document body
document.body.style.fontSize = fontSize + 'px';

// Increase font size
document.getElementById('increase-font').addEventListener('click', function() {
  fontSize++;
  document.body.style.fontSize = fontSize + 'px';
  localStorage.setItem('fontSize', fontSize);
});

// Decrease font size
document.getElementById('decrease-font').addEventListener('click', function() {
  fontSize--;
  document.body.style.fontSize = fontSize + 'px';
  localStorage.setItem('fontSize', fontSize);
});
// Negative contrast
document.getElementById("negative-contrast-button").addEventListener("change", function() {
  if (this.checked) {
     document.body.classList.add("negative-contrast");
     localStorage.setItem("negative-contrast", true);
  } else {
     document.body.classList.remove("negative-contrast");
     localStorage.setItem("negative-contrast", false);
  }
});

// High contrast
document.getElementById("high-contrast-button").addEventListener("change", function() {
  if (this.checked) {
     document.body.classList.add("high-contrast");
     localStorage.setItem("high-contrast", true);
  } else {
     document.body.classList.remove("high-contrast");
     localStorage.setItem("high-contrast", false);
  }
});

// Greyscale
document.getElementById("grayscale-toggle").addEventListener("change", function() {       
  if (this.checked) {
     document.body.classList.add("grayscale");
     localStorage.setItem("grayscale", true);
  } else {
     document.body.classList.remove("grayscale");
     localStorage.setItem("grayscale", false);
  }
});

// Light background
const lightBackgroundToggle = document.getElementById("light-background");

lightBackgroundToggle.addEventListener("change", function() {
  if (this.checked) {
     document.body.classList.add("light-background");
     localStorage.setItem("light-background", true);
  } else {
     document.body.classList.remove("light-background");
     localStorage.setItem("light-background", false);
  }
});

// Text to speech
var speaking = false;

function speakTextOnHover(e) {
  if (!speaking) {
    var target = e.target;
    var textToSpeak = target.innerText;
    var speech = new SpeechSynthesisUtterance();
    speech.text = textToSpeak;
    speech.lang = "en-UK";
    window.speechSynthesis.speak(speech);
    speaking = true;
  }
}

function stopSpeaking() {
  window.speechSynthesis.cancel();
  speaking = false;
  localStorage.setItem("text-speech", false);
}

document.getElementById("text-speech").addEventListener("change", function() {
  if (this.checked) {
    document.body.addEventListener('mouseover', speakTextOnHover);
    document.body.addEventListener('mouseout', stopSpeaking);
  } else {
    document.body.removeEventListener('mouseover', speakTextOnHover);
    document.body.removeEventListener('mouseout', stopSpeaking);
    stopSpeaking();
  }
});


// Reset button
document.getElementById("reset-button").addEventListener("click", function() {
  localStorage.clear();
  location.reload();
});

// Load saved settings
if (localStorage.getItem("font-size")) {
  document.body.style.fontSize = localStorage.getItem("font-size");
}
if (localStorage.getItem("negative-contrast")) {
  if (localStorage.getItem("negative-contrast") === "true") {
     document.body.classList.add("negative-contrast");
     document.getElementById("negative-contrast-button").checked = true;
  }
}
if (localStorage.getItem("high-contrast")) {
  if (localStorage.getItem("high-contrast") === "true") {
     document.body.classList.add("high-contrast");
     document.getElementById("high-contrast-button").checked = true;
  }
}
if (localStorage.getItem("grayscale")) {
  if (localStorage.getItem("grayscale") === "true") {
     document.body.classList.add("grayscale");
     document.getElementById("grayscale-toggle").checked = true;
  }
}
if (localStorage.getItem("light-background")) {
  if (localStorage.getItem("light-background") === "true") {
     document.body.classList.add("light-background");
     document.getElementById("light-background").checked = true;
  }
}
if (localStorage.getItem("text-to-speech")) {
  if (localStorage.getItem("text-to-speech") === "true") {
     document.body.classList.add("text-speech");
     document.getElementById("text-speech").checked = true;
  }
}

// Get the reset button element
const resetButton = document.querySelector('#reset-button');

// Add an event listener to the reset button
resetButton.addEventListener('click', function() {
  // Clear all saved preferences from local storage
  localStorage.clear();

  // Set all accessibility features to their default values
  setDefaultAccessibilitySettings();
});

// Function to set all accessibility features to their default values
function setDefaultAccessibilitySettings() {
  // Set font size to default (16px)
  document.body.style.fontSize = '16px';

  // Uncheck all checkboxes
  document.querySelector('#negative-contrast-button').checked = false;
  document.querySelector('#high-contrast-button').checked = false;
  document.querySelector('#grayscale-toggle').checked = false;
  document.querySelector('#light-background').checked = false;
  document.querySelector('#text-speech').checked = false;

  // Stop text to speech if it's currently active
  window.speechSynthesis.cancel();
}
