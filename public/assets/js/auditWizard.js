// scripts for image upload

document.addEventListener('DOMContentLoaded', () => {
  imgUpload();
});

function imgUpload() {
  let imgWrap = "";
  let imgArray = [];

  document.querySelectorAll('.upload__inputfile').forEach(input => {
    input.addEventListener('change', (e) => {
      imgWrap = input.closest('.upload__box').querySelector('.upload__img-wrap');
      const maxLength = input.dataset.max_length;

      const files = e.target.files;
      const formData = new FormData();

      Array.from(files).forEach((file) => {
        if (file.type.match('image.*') && imgArray.length <= maxLength) {
          formData.append('images[]', file);
          imgArray.push(file);

          const reader = new FileReader();
          reader.onload = function (e) {
            const html =
              `<div class='upload__img-box'><div style='background-image: url(${e.target.result})' data-number='${document.querySelectorAll(".upload__img-close").length}' data-file='${file.name}' class='img-bg'><div class='upload__img-close'></div></div></div>`;
            imgWrap.insertAdjacentHTML('beforeend', html);
          }
          reader.readAsDataURL(file);
        }
      });

      fetch('/AuditController/mediaUpload', {
        method: 'POST',
        body: formData
      })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            console.log('Uploaded files:', data.filenames);
          } else {
            console.error('Upload error:', data.errors);
          }
        })
        .catch(error => {
          console.error('Upload error:', error);
        });
    });
  });
}




document.querySelector('body').addEventListener('click', (e) => {
  if (e.target.matches('.upload__img-close')) {
    const file = e.target.closest('.img-bg').dataset.file;
    for (let i = 0; i < imgArray.length; i++) {
      if (imgArray[i].name === file) {
        imgArray.splice(i, 1);
        break;
      }
    }
    e.target.closest('.upload__img-box').remove();
  }
});



// nav bar selection scripts
var navLinks = document.querySelectorAll('.wizard-nav-item');
navLinks.forEach(function (link) {
  link.addEventListener('click', function (e) {
    e.preventDefault();
    var target = document.getElementById(link.getAttribute('data-target'));
    target.scrollIntoView({
      behavior: 'smooth'
    });
  });
});


// When progress is complete enable submit is enabled

const enableSubmit = () => {
  const submit = document.getElementById('rpt-button');
  submit.classList.remove('disabled');
  submit.setAttribute('href', '#confirm-modal');
  submit.classList.add('btn-primary');
  submit.classList.remove('btn-outline-danger');
  submit.removeAttribute('disabled');
  submit.setAttribute('title', 'Audit complete');
  submit.innerHTML = '<i class="fa fa-check"></i> Finished';
}


const progUpdate = (value) => {
  var prog = document.getElementById('prog');
  var titleProg = document.getElementById('title-percent');

  prog.style.width = value + '%';
  // titleProg.innerHTML = value + '%';

  (value == 100) && enableSubmit()

  console.log("value", value)
}


// posting content back to server
document.querySelectorAll('.qbox').forEach(qbox => {
  qbox.addEventListener('change', () => {
    const id = parseInt(qbox.getAttribute('data-id'));
    const textarea = qbox.querySelector('textarea');
    const textareaValue = textarea.value;

    const radioButton = qbox.querySelector('input[type="radio"]:checked');
    const radioButtonValue = radioButton.value;

    let data = {
      id: id,
      notes: textareaValue,
      response: radioButtonValue
    };

    fetch('/AuditController/addResponse', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(data)
    })
      .then(response => {
        if (response.ok) {
          response.json().then(data => {
            toastr.success(data.message);
            progUpdate(parseInt(data.percent))
          });
        } else {

          toastr.error('An error occurred');
        }
      })
      .catch(error => {
        // Display error message
        toastr.error('An error occurred');
        console.error(error);
      });

  });
});

const sections = document.querySelectorAll('section');
const observer = new IntersectionObserver((entries) => {
  let minDistance = Number.POSITIVE_INFINITY;
  let closestSection = null;
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      const distance = Math.abs(entry.boundingClientRect.top);
      if (distance < minDistance) {
        minDistance = distance;
        closestSection = entry.target;
      }
    }
  });
  if (closestSection) {
    console.log(`Closest heading to top: ${closestSection.id}`);
    const activeTab = document.querySelector('.wizard-nav-item.active');
    const targetTab = document.querySelector(`.wizard-nav-item[data-target="${closestSection.id}"]`);
    if (activeTab !== targetTab) {
      activeTab.classList.remove('active');
      targetTab.classList.add('active');
    }
  }
});
sections.forEach((section) => {
  observer.observe(section);
});


// scroller button
const scrollToTopButton = document.getElementById('scroll-to-top-btn');

scrollToTopButton.addEventListener('click', () => {
  const tabPane = document.querySelector('.tab-pane');
  tabPane.scrollIntoView({
    behavior: 'smooth'
  });
});



// Protected on back end anyway, but this is just for cosmetic purposes
const container = document.querySelector('.container');
const aStatus = container.getAttribute('a-status');

const lockForm =  () =>{

  const inputs = container.querySelectorAll('button, input, textarea, a.btn');
  inputs.forEach(item => {
    item.disabled = true;
  });
}

if(aStatus === 'Complete'){
  lockForm();
}


