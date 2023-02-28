<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

  <link href="<?= base_url(); ?>/assets/css/style_theme.css" rel="stylesheet">
  <link href="<?= base_url(); ?>/assets/css/animate4.min.css" rel="stylesheet">

  <style>
    .tab-container {
      display: flex;
      flex-direction: row;
      max-height: 100vh;
      width: 100vw;
      position: relative;
      overflow-y: scroll;
    }

    .tab-list {
      flex-basis: 150px;
      flex-shrink: 0;
      display: flex;
      flex-direction: column;
      justify-content: flex-start;
      position: sticky;
      top: 0;
      padding-left: 0;
    }

    .tab {
      border-right: 1px solid #ccc;
      padding: 10px;
      background-color: #f5f5f5;
      cursor: pointer;
    }


    .tab-content {
      display: flex;
      flex-direction: column;
      flex-grow: 1;
      max-height: calc(100vh - 5rem);
      overflow-y: auto;
    }

    .tab-pane {
      padding: 10px;
      flex-grow: 1;
    }

    .tab-pane.active {
      display: block;
    }

    .tab-pane:not(.active) {
      display: none;
    }

    .wizard-nav-item {
      height: 5rem;
      text-decoration: none;
      align-items: center;
      justify-content: center;
      display: flex;
      color: black;
      transition: 0.3s;
    }

    .wizard-nav-item.active {
      background-color: black;
      color: white;
      font-size: 110%;
      transition: 0.3s;
    }

    h1 {
      text-transform: capitalize;
    }

    #scroll-to-top-btn {
      position: fixed;
      bottom: 20px;
      right: 20px;
    }
  </style>
</head>

<body>

  <?php

function createQuestionBox($q_item) {
    $html = '<div data-id="'.$q_item['car_id'].'" class="ibox qbox" id="qcontent-' . $q_item['car_id'] . '">';
    $html .= '<div class="ibox-title bg-muted"><h5>' . $q_item['question'] . '</h5></div>';
    $html .= '<div class="ibox-content"><div class="row"><div class="col-sm-6">';
    $html .= '<label class="radio-inline"><input type="radio" name="optradio" value="1" checked="">Yes</label>';
    $html .= '<label class="radio-inline"><input type="radio" name="optradio"value="0" >No</label>';
    $html .= '<textarea class="form-control" placeholder="Write comment..."></textarea>';
    $html .= '</div><div class="col-sm-6"><div class="upload__box">';
    $html .= '<label class="upload__btn success"><div class="upload__btn-box">';
    $html .= '<i class="fa fa-upload"></i>Upload<input type="file" multiple="" data-max_length="20" class="upload__inputfile">';
    $html .= '</div><div class="upload__img-wrap"></div></label></div></div></div></div></div>';
    return $html;
}
?>

  <div class="tab-container">
    <ul class="tab-list">
      <?php
      $c = 1;
      foreach ($question_data as $k => $v) {
        echo '<li class="wizard-nav-item' . ($c == 1 ? " active" : "") . '" data-target="sec-' . $c . '"><a>' . $k . '</a></li>';
        $c++;
      }
    ?>
    </ul>
    <div class="tab-content">
      <div class="tab-pane active">

        <?php
              $c=1;
              foreach ($question_data as $k=>$v) {
                echo '<section  id="sec-'.$c.'">';
                echo '<h1>'. $k.'</h1>';
                  foreach ($question_data[$k] as $q_item){


                    
                      echo createQuestionBox($q_item);

                      
                  }
                echo '</section>';
                $c++;
               } ?>

      </div>
    </div>
  </div>

  <button id="scroll-to-top-btn">Scroll to Top</button>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
  </script>



  <script>
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
  </script>


  <script>
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
            console.log(response)
          })
          .catch(error => {
            console.error(error);
          });
      });
    });
  </script>

  <script>
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

    const scrollToTopButton = document.getElementById('scroll-to-top-btn');

    scrollToTopButton.addEventListener('click', () => {
      const tabPane = document.querySelector('.tab-pane');
      tabPane.scrollIntoView({
        behavior: 'smooth'
      });
    });
  </script>
</body>

</html>