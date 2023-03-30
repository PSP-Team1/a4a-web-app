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
        <br>
        Our training programmes are designed and delivered by learning professionals who are members of the Chartered Institute of Personnel and Development.

Our access and inclusion audits are carried out by Centre for Accessible Environments trained auditors with extensive experience.

Our design appraisal work and consultancy is provided by friendly consultants with comprehensive expertise.

Our lived experience of disability means that we bring first-hand knowledge and a practical approach to everything we do.
        <h1 class="h1"> Our Partners </h1>
        <img style="position: relative; top: 10px; right: -30px; filter: drop-shadow(1px 2px 1px #ffffff); width: 80%;" src="/assets/img/a4apartners.jpg" alt="">
    </div>
    <br>
    <br>
		<a href="<?= base_url() ?>/home" class="btn btn-light">Return To Homepage</a>
		<br>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>