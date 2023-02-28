<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="./assets/img/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/registerStyle.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body class="animate__animated animate__fadeIn">
    <div class="wrapper">

        <style>
            body {
                background-image: url('https://static.vecteezy.com/system/resources/previews/007/934/082/original/abstract-yellow-and-green-gradient-waves-background-glowing-lines-on-green-background-vector.jpg');
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: cover;
            }
        </style>

        <div class="login-container">

            <section class="Login-form">

                <div class="fusion-separator fusion-no-medium-visibility fusion-no-large-visibility fusion-full-width-sep"
                    style="align-self: center;margin-left: auto;margin-right: auto;margin-top:100px;margin-bottom:10px;width:100%;">
                </div>

                <div class="alert alert-success" role="alert">
                    <h2 class="alert-heading">Congratulations!</h2>
                    <p style="font-size: 20px">You have created a new company user. You can now login to the customer
                        portal using the credentials you provided.</p>
                    <hr>
                    If you would like to login click <a href="/login" class="alert-link">here</a>. Alternatively, if you
                    would like to create another account you can click
                    <a href="/register" class="alert-link">here</a>.

                    <p>Redirecting to login in <span id="countdown"></span> seconds</p>


                </div>

        </div>
        </section>
    </div>
    </div>

    <script>
        var count = 10;
        var interval = setInterval(function () {
            document.getElementById("countdown").innerHTML = count;
            count--;
            if (count === 0) {
                clearInterval(interval);
                window.location.href = "<?=base_url()?>/login";
            }
        }, 1000);
    </script>
</body>