<?= view('templates/header') ?>

<head>
    <meta charset="UTF-8">
    <title>Payment Success</title>
    <style>
        body {
            padding: 5em;
            text-align: center;
        }

        h1 {
            margin-bottom: 1em;
        }

        .circle-loader {
            margin-bottom: 3.5em;
            border: 1px solid rgba(0, 0, 0, 0.2);
            border-left-color: #5cb85c;
            animation: loader-spin 1.0s linear;
            position: relative;
            display: inline-block;
            vertical-align: top;
            border-radius: 50%;
            width: 7em;
            height: 7em;
        }

        .load-complete .circle {
            animation: none;
            border-color: #5cb85c;
            transition: border 100ms ease-out;
        }

        .checkmark {
            display: none;
        }

        .checkmark.draw:after {
            animation-duration: 700ms;
            animation-timing-function: ease-in-out;
            animation-name: checkmark;
            transform: scaleX(-1) rotate(135deg);
        }

        .checkmark:after {
            opacity: 1;
            height: 3.5em;
            width: 1.75em;
            transform-origin: left top;
            border-right: 3px solid #5cb85c;
            border-top: 3px solid #5cb85c;
            content: "";
            left: 1.75em;
            top: 3.5em;
            position: absolute;
        }

        @keyframes loader-spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        @keyframes checkmark {
            0% {
                height: 0;
                width: 0;
                opacity: 1;
            }

            20% {
                height: 0;
                width: 1.75em;
                opacity: 1;
            }

            40% {
                height: 3.5em;
                width: 1.75em;
                opacity: 0.8;
            }

            100% {
                height: 3.5em;
                width: 1.75em;
                opacity: 1;
            }
        }

        .loader-full-outl {
            border-color: #5cb85c;
        }
    </style>
</head>
<div class="container">

    <div class="row">
        <div class="col-lg-12">

            <div class="ibox">
                <div class="ibox-content">
                    <h1>Thank you for your payment</h1>
                    <p>Your credit is avaiable for you to use immediately.</p>

                    <p>Payment reference: <?= $_GET['ref'] ?></p>

                    <div class="circle-loader">
                        <div class="checkmark draw"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    window.onload = () => {
        const circleLoader = document.querySelector('.circle-loader');
        const checkmark = document.querySelector('.checkmark');

        circleLoader.classList.add('load-complete');
        setTimeout(() => {
            checkmark.style.display = 'block';
            checkmark.classList.add('draw');
            circleLoader.classList.remove('load-complete');
            circleLoader.classList.add('loader-full-outl');
        }, 1200);
    };
</script>

<!-- Your footer code here -->


<?= view('templates/footer') ?>