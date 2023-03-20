<?= view('templates/accessibilityPortal') ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>FAQ Page</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <style>
	body {
            background-image: url('https://images.wallpaperscraft.com/image/single/texture_spots_lemon_143188_1920x1080.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            }

            .h1{
              color: purple;
            }
            </style>
             <div class="logo-container">
                        <img style="position: relative; top: -15px; right: -30px; filter: drop-shadow(1px 2px 1px #ffffff);" src="/assets/img/Everybody-Welcome-logo.png" alt="">
                     </div>
</head>
<body>
	<div class="container">
		
    <h1 class="h1">Frequently Asked Questions</h1>
  
		<div class="card">
			<div class="card-header">
				<h3 class="mb-0">
					<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
						Question 1: q?
					</button>
				</h3>
			</div>
			<div id="collapse1" class="collapse show" aria-labelledby="heading1" data-parent="#accordion">
				<div class="card-body">
					answer
				</div>
			</div>
		</div>
		
    <div class="card">
		<div class="card-header">
			<h3 class="mb-0">
				<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
					Question 2: q?
				</button>
			</h3>
		</div>
		<div id="collapse3" class="collapse" aria-labelledby="heading3" data-parent="#accordion">
			<div class="card-body">
				answer
			</div>
		</div>
	</div>
	
	<div class="card">
		<div class="card-header">
			<h3 class="mb-0">
				<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
					Question 3: q?
				</button>
			</h3>
		</div>
		<div id="collapse4" class="collapse" aria-labelledby="heading4" data-parent="#accordion">
			<div class="card-body">
				answer
			</div>
		</div>
	</div>
	
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
		
	
