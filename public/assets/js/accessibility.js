// Get the current font size from localStorage, or use a default value
let fontSize = localStorage.getItem('fontSize') || 14;

// Set the font size of all elements on the page
document.querySelectorAll('*').forEach(function(node) {
  node.style.fontSize = fontSize + 'px';
});

// Increase font size
document.getElementById('increase-font').addEventListener('click', function() {
  console.log("Increase button clicked!");
  fontSize++;
  document.querySelectorAll('*').forEach(function(node) {
    node.style.fontSize = fontSize + 'px';
  });
  localStorage.setItem('fontSize', fontSize);
});

// Decrease font size
document.getElementById('decrease-font').addEventListener('click', function() {
  fontSize--;
  document.querySelectorAll('*').forEach(function(node) {
    node.style.fontSize = fontSize + 'px';
  });
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


// Greyscale
document.getElementById("light-mode-toggle").addEventListener("change", function() {       
  if (this.checked) {
     document.body.classList.add("light-mode");
     localStorage.setItem("light-mode", true);
  } else {
     document.body.classList.remove("light-mode");
     localStorage.setItem("light-mode", false);
  }
});





// Dark mode
document.addEventListener('DOMContentLoaded', function() {
  const lightModeToggle = document.getElementById('dark-mode-toggle');
  const body = document.body;

  lightModeToggle.addEventListener('click', function() {
    if (body.classList.contains('dark-mode')) {
      body.classList.remove('dark-mode');
      body.classList.add('light-mode-1');
    } else {
      body.classList.remove('light-mode-1');
      body.classList.add('dark-mode');
    }
  });
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
if (localStorage.getItem("light-mode")) {
  if (localStorage.getItem("light-mode") === "true") {
     document.body.classList.add("light-mode");
     document.getElementById("light-mode-toggle").checked = true;
  }
}
if (localStorage.getItem("dark-mode")) {
  if (localStorage.getItem("ddark-mode") === "true") {
     document.body.classList.add("dark-mode");
     document.getElementById("dark-mode-toggle").checked = true;
  }
}

// Get the reset button element
const resetButton = document.querySelector('#reset-button');

// Add an event listener to the reset button
resetButton.addEventListener('click', function(event) {
  // Prevent the default behavior of the button, which is to submit a form or reload the page
  event.preventDefault();

  // Clear all saved preferences from local storage
  localStorage.clear();

  // Set all accessibility features to their default values
  setDefaultAccessibilitySettings();

  // Function to set all accessibility features to their default values
  function setDefaultAccessibilitySettings() {
    // Set font size to default (16px)
    document.body.style.fontSize = '16px';

    // Turn off accessibility features
    document.querySelector('#negative-contrast-button').checked = false;
    document.body.classList.remove("negative-contrast");

    document.querySelector('#high-contrast-button').checked = false;
    document.body.classList.remove("high-contrast");

    document.querySelector('#grayscale-toggle').checked = false;
    document.body.classList.remove("grayscale");

    document.querySelector('#light-background').checked = false;
    document.body.classList.remove("light-background");

    document.querySelector('#text-speech').checked = false;
    document.body.classList.remove("text-speech");

    document.querySelector('#light-mode-toggle').checked = false;
    document.body.classList.remove("light-mode");

    document.querySelector('#dark-mode-toggle').checked = false;
    document.body.classList.remove("dark-mode-toggle");


    // Stop text to speech if it's currently active
    window.speechSynthesis.cancel();
  }

  // Prevent the page from reloading
  return false;
});
