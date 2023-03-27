
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
  <img style="position: relative; top: 10px; right: -30px; filter: drop-shadow(1px 2px 1px #ffffff); width: 15%;" src="/assets/img/Making-Everybody-Welcome.png" alt="">
</div>
</head>
<body>
	<div class="container">
		
    <h1 class="h1">Frequently Asked Questions</h1>
	<h2>Standard Questions </h2>
  
		<div class="card">
			<div class="card-header">
				<h3 class="mb-0">
					<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
						Question: Is my disability included?
					</button>
				</h3>
			</div>
			<div id="collapse1" class="collapse" aria-labelledby="heading1" data-parent="#accordion">
				<div class="card-body">
					Our comprehensive auditing system allows for accessibility features for a huge range of diabilities to be tested by a business.
					This ensures that whatever your disability, it will be taken into account to allow you to know whether a business is suitable for you.
				</div>
			</div>

			<div class="card">
			<div class="card-header">
				<h3 class="mb-0">
					<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse6" aria-expanded="true" aria-controls="collapse1">
						Question: How can I find businesses to visit?
					</button>
				</h3>
			</div>
			<div id="collapse6" class="collapse" aria-labelledby="heading1" data-parent="#accordion">
				<div class="card-body">
					There a multiple ways to find businesses on our search page, as you can search by location or type to find somewhere that fits your needs
				</div>
			</div>
		</div>
		<div class="card">
			<div class="card-header">
				<h3 class="mb-0">
					<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse7" aria-expanded="true" aria-controls="collapse1">
						Question: Is there any way to leave feedback?
					</button>
				</h3>
			</div>
			<div id="collapse7" class="collapse" aria-labelledby="heading1" data-parent="#accordion">
				<div class="card-body">
					We have a review system that allows you to give your thoughts on a business you have visited which can then be used by other people
					considering visiting to further inform their visit along with the data provided through the audit
				</div>
			</div>
		</div>

		</div>
		<br>
		<h2>Business Questions </h2>
    <div class="card">
		<div class="card-header">
			<h3 class="mb-0">
				<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
					Question: I have a business, how can i get started with your system?
				</button>
			</h3>
		</div>
		<div id="collapse3" class="collapse" aria-labelledby="heading3" data-parent="#accordion">
			<div class="card-body">
				To get started, you can register for an account and upload your business to our site.
				This will allow you to begin with a simple audit to allow us to give you a basic accessibility ranking and recieve
				a listing on our business search page. More in depth audits can be accquired as part of our premium offerings
			</div>
		</div>
	</div>
	
	<div class="card">
		<div class="card-header">
			<h3 class="mb-0">
				<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
					Question: How is the pricing for premium offerings?
				</button>
			</h3>
		</div>
		<div id="collapse4" class="collapse" aria-labelledby="heading4" data-parent="#accordion">
			<div class="card-body">
				All pricings for premium audit offerings can be accessed from within the business dashboard.
			</div>
		</div>
	</div>

	<div class="card">
			<div class="card-header">
				<h3 class="mb-0">
					<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse8" aria-expanded="true" aria-controls="collapse1">
						Question: How well advertised will my business be?
					</button>
				</h3>
			</div>
			<div id="collapse8" class="collapse" aria-labelledby="heading1" data-parent="#accordion">
				<div class="card-body">
					We have a complex algorithm that determines search preference, which includes factors such as accessibility score, customer reviews
					and premium customer status, all of which mix together to ensure that more compelete businesses will be featured further up in the search rankings
				</div>
			</div>
		</div>

	<br>
	<a href="<?= base_url() ?>/home" class="btn btn-light">Return To Homepage</a>
	<br>
	<br>
	
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
		
	
