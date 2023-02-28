<!DOCTYPE html>

<head>
<link rel="shortcut icon" href="./assets/img/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/accessiblity.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet"> 
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</head>

<div class="dropdown">
        <button href="#accessibilityModal" data-bs-toggle="modal" class="btn btn-secondary floating-btn" type="button">
        <b>A</b>
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

                    <button class="btn btn-secondary" id="increase-font">Increase Font Size</button> <!-- increase font button -->

                    <button class="btn btn-secondary" id="decrease-font">Decrease Font Size</button> <!-- decrease font button-->

                    <hr>

                    <button class="btn btn-secondary" id="negative-contrast-button">Negative Contrast</button><!--negative contrast button -->

                    <button class="btn btn-secondary" id="high-contrast-button">High Contrast</button> <!--high contrast button -->

                    <hr>

                    <button class="btn btn-secondary" id="grayscale-toggle">Toggle Greyscale</button> <!--grayscale button-->

                    <button class="btn btn-secondary" id="light-background">Light Background</button> <!--light background button -->
                            
                    </div>
                    <div class="modal-footer">
                    <button class="btn btn-secondary" id="reset-button">Reset</button><!--reset button -->
                        <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

<html lang="en" dir="ltr">
  <head>
  
    <meta charset="utf-8">  
    
    <style>
      .grayscale {
        filter: grayscale(100%);
  -webkit-filter: grayscale(100%);
  }
 
      </style>
<style>
  .light-background {
    display: block;
  }
  #white-image {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: -1;
  }
</style>

  <style>
  .high-contrast {
    background: black;
    color: white;
    filter: invert(100%);
  }
</style>
<style>
.negative-contrast {
  filter: invert(1) hue-rotate(180deg);
  background: black;
}
</style>



<style>
.buttons-container{
  position: fixed;
  top: 0;
  left:0;
  right:0;
}
  </style>
    <link rel="stylesheet" href="assets/css/qr.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
    <div class="wrapper">
      <header>
        
        <h1 style="color:white">QR Code Generator</h1>
        <p>Paste a url or enter text to create QR code</p>
      </header>
      <div class="form">
        <input type="text" spellcheck="false" placeholder="Enter text or url">
        <button>Generate QR Code</button>
      </div>
      <div class="qr-code">
        <img src="" alt="qr-code">
      </div>
    </div>

    <script src="https://unpkg.com/jspdf@1.5.3/dist/jspdf.min.js"></script> <!--donwnload pdf-->
    
<script>
const wrapper = document.querySelector(".wrapper"),
qrInput = wrapper.querySelector(".form input"),
generateBtn = wrapper.querySelector(".form button"),
downloadBtn = document.createElement("a"),
qrImg = wrapper.querySelector(".qr-code img");

downloadBtn.innerText = "Download QR Code";
downloadBtn.setAttribute("download", "qr-code.pdf");
wrapper.querySelector(".qr-code").appendChild(downloadBtn);

let preValue;

generateBtn.addEventListener("click", () => {
    let qrValue = qrInput.value.trim();
    if(!qrValue || preValue === qrValue) return;
    preValue = qrValue;
    generateBtn.innerText = "Generating QR Code...";
    qrImg.src = `https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=${qrValue}`;
    qrImg.addEventListener("load", () => {
        wrapper.classList.add("active");
        generateBtn.innerText = "Generate QR Code";
        downloadBtn.href = "#";
        downloadBtn.addEventListener("click", () => {
            const pdf = new jsPDF();
            pdf.addImage(qrImg, "PNG", 10, 10, 50, 50);
            pdf.save("qr-code.pdf");
        });
    });
});

qrInput.addEventListener("keyup", () => {
    if(!qrInput.value.trim()) {
        wrapper.classList.remove("active");
        preValue = "";
    }
});
</script>
<!--increase font js-->
<script>

const increaseFontBtn = document.querySelector("#increase-font");
  let fontSize = 14;

  increaseFontBtn.addEventListener("click", () => {
    fontSize += 2;
    document.querySelectorAll("body *").forEach(el => {
      el.style.fontSize = `${fontSize}px`;
    });
  });


  </script>

<!--decrease font-->
<script>
const decreaseFontBtn = document.querySelector("#decrease-font");

decreaseFontBtn.addEventListener("click", () => {
  fontSize -= 2;
  document.querySelectorAll("body *").forEach(el => {
    el.style.fontSize = `${fontSize}px`;
  });
});

</script>

<!--grayscale-->
<script>
// get the button and the HTML tag
const toggleButton = document.getElementById('grayscale-toggle');
const htmlTag = document.getElementsByTagName('html')[0];

// function to toggle the grayscale filter
function toggleGrayscale() {
  if (htmlTag.classList.contains('grayscale')) {
    htmlTag.classList.remove('grayscale');
  } else {
    htmlTag.classList.add('grayscale');
  }
}

// add event listener to the button
toggleButton.addEventListener('click', toggleGrayscale);
</script>


<!--lightbackground--> 
<!--lightbackground--> 
<script>
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
    } else {
      body.style.backgroundColor = "#ffffff";
      body.appendChild(whiteImage);
    }
  }

  lightBackgroundBtn.addEventListener("click", toggleLightBackground);
</script>

<!--high contrast-->
<script>

  const button = document.getElementById('high-contrast-button');
  button.addEventListener('click', function() {
    document.body.classList.toggle('high-contrast');
  });

  </script>
<!--negative contrast-->
<script>
const buttons = document.getElementById('negative-contrast-button');
  buttons.addEventListener('click', function() {
    document.body.classList.toggle('negative-contrast');
  });
</script>

<!--reset button-->
<script>
const resetButton = document.getElementById('reset-button');

resetButton.addEventListener('click', () => {
  // Remove grayscale filter
  document.getElementsByTagName('html')[0].classList.remove('grayscale');
  // Remove high contrast filter
  document.body.classList.remove('high-contrast');
  // Remove negative contrast filter
  document.body.classList.remove('negative-contrast');
  // Remove light background
  document.body.style.backgroundColor = '';
  // Reset font size
  document.querySelectorAll('body *').forEach(el => {
    el.style.fontSize = '';
  });
});
</script>


  </body>
</html>