<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
	
	<title>Kakamega County Pastors Association</title>

	<!-- Loading third party fonts -->
	<link href="fonts/novecento-font/novecento-font.css" rel="stylesheet" type="text/css">
	<link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">

	<!-- Loading main css file -->
	<link rel="stylesheet" href="style.css">
	
		<!--[if lt IE 9]>
		<script src="js/ie-support/html5.js"></script>
		<script src="js/ie-support/respond.js"></script>
	<![endif]-->

</head>


<body>
	<div class="site-content">
		<header class="site-header">
			<div class="container">
				<a href="#" class="branding">
					<img src="images/logo.png" alt="" class="logo">
					<h1 class="site-title">Kakamega County Pastors Assoction</h1>
				</a>

				<div class="main-navigation">
					<button class="menu-toggle"><i class="fa fa-bars"></i> Menu</button>
					<ul class="menu">
						<li class="menu-item current-menu-item"><a href="index.html">Homepage <small>KCPA Overview</small></a></li>
						<li class="menu-item"><a href="#">About KCPA <small>About us</small></a></li>
						<li class="menu-item"><a href="seremons.html">Sub-County Sites <small>view our subcounties</small></a></li>
						<li class="menu-item"><a href="events.html">Events <small>Our activities</small></a></li>
						<li class="menu-item"><a href="#">Why us <small>Join us</small></a></li>
						<li class="menu-item"><a href="families.html">Contact <small>get in touch with us</small></a></li>
					</ul>
				</div>

				<div class="mobile-navigation"></div>
			</div>
		</header> <!-- .site-header -->

		<div class="hero">
			<div class="slides">
				<li data-bg-image="images/slide-1.jpg">
					<div class="container">
						<div class="slide-content">
							<small class="slide-subtitle">Kakamega County Pastors Association</small>
							<h2 class="slide-title">Place with a real love</h2>

							<a href="#" class="button">Read more...</a>
						</div>
					</div>
				</li>

				<li data-bg-image="images/slide-1.jpg">
					<div class="container">
						<div class="slide-content">
							<small class="slide-subtitle">Kakamega County Pastors Association</small>
							<h2 class="slide-title">Place with a real love</h2>

							<a href="#" class="button">Read more...</a>
						</div>
					</div>
				</li>
			</div>
		</div>

		<main class="main-content">
			<div class="fullwidth-block">
				<div class="container">
					@include('web.main.recentnews')

					 <!-- .row -->
				</div> <!-- .container -->
			</div> <!-- section -->

			<div class="fullwidth-block">
				<div class="container">
					@include('web.main.main_body')
					 <!-- .row -->
				</div> <!-- .container -->
			</div> <!-- section -->
		</main> <!-- .main-content -->

		 <!-- .site-footer -->
		 @include('web.main.footer')

	</div>
	

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/plugins.js"></script>
	<script src="js/app.js"></script>
	
</body>

</html>