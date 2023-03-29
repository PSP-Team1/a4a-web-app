<!DOCTYPE html>
<html>
<?= view('templates/accessibility'); ?>
<title>About Us</title>

<head>
    <link rel="shortcut icon" href="./assets/img/favicon_io/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="./assets/css/accessiblity.css" />
    <script src="./assets/js/accessibility.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <style>
        body {
            background-image: url('https://images.wallpaperscraft.com/image/single/texture_spots_lemon_143188_1920x1080.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }

        .h1 {
            color: purple;
        }
    </style>
    <div class="logo-container">
        <img style="position: relative; top: 10px; right: -30px; filter: drop-shadow(1px 2px 1px #ffffff); width: 15%;" src="/assets/img/Making-Everybody-Welcome.png" alt="">
    </div>
</head>

<body>
    <div class="container">

        <h1 class="h1">About us</h1>
        Access Consultancy, Training, Auditing and Inclusive Design Specialists
        Professional access consultancy, training, auditing and design appraisal services to clients large and small across all sectors. People are at the heart of everything we do because people make change happen. Working in partnership, we enable people to create places, services and experiences which are accessible and inclusive for all.
        <h1 class="h1"> Our Partners </h1>
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                        The Ramp People: Wheelchair Ramps
                    </button>
                </h3>
            </div>
            <div id="collapse1" class="collapse" aria-labelledby="heading1" data-parent="#accordion">
                <div class="card-body">
                    The Ramp People has the most comprehensive range of wheelchair ramps in the UK. Renowned for high quality & excellent value, our range includes economy and premium folding wheelchair ramps, channel ramps, fibreglass, threshold and modular wheelchair ramps.
                    <a href="https://www.theramppeople.co.uk/wheelchair-ramps?gclid=CjwKCAjw_YShBhAiEiwAMomsEKuL0HFsLubpa7pn5sv8LXWO3H42uq3261GUEDCykHnCkLqeqQahShoCePIQAvD_BwE">Visit website</a>
                    <img style="position: relative; top: 10px; right: -30px; filter: drop-shadow(1px 2px 1px #ffffff); width: 15%;" src="/assets/img/ramppeoplelogo.png" alt="">
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse2" aria-expanded="true" aria-controls="collapse1">
                        SafetyBuyer.com: Braille and Tactile Signs
                    </button>
                </h3>
            </div>
            <div id="collapse2" class="collapse" aria-labelledby="heading1" data-parent="#accordion">
                <div class="card-body">
                    At Safety Buyer, we understand the importance of ensuring that everyone is kept safe from harm while on your premises. We have a range of braille and tactile signs that provide valuable information to the visually impaired, including warning signs, fire evacuation procedures and key location signs.
                    <a href="https://www.safetybuyer.com/safety-signs/information-signs/braille-signs.html?gclid=CjwKCAjw_YShBhAiEiwAMomsEFfVrKROGgOyP4k8tUiqMKLgkXrsckK4AY5rdwPRAwJd4DvJBp1JDRoCVZkQAvD_BwE">Visit website</a>
                    <br>
                    <img style="position: relative; top: 10px; right: -30px; filter: drop-shadow(1px 2px 1px #ffffff); width: 15%;" src="/assets/img/safetybuyerlogo.png" alt="">
                </div>
            </div>
        </div>
        <br>
        <a href="<?= base_url() ?>/home" class="btn btn-light">Return To Homepage</a>

    </div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>