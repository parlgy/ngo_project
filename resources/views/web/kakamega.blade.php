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
					<h2 class="section-title">Recent news</h2>

					<div class="row">
						<div class="col-md-3 col-sm-6">
							<div class="news">
								<image class="news-image" src="images/news-thumb-1.jpg"></image>
								<h3 class="news-title"><a href="#">laboris nisi ut aliquip</a></h3>
								<small class="date"><i class="fa fa-calendar"></i>24 mar 2014</small>
							</div>
						</div>
						<div class="col-md-3 col-sm-6">
							<div class="news">
								<image class="news-image" src="images/news-thumb-2.jpg"></image>
								<h3 class="news-title"><a href="#">laboris nisi ut aliquip</a></h3>
								<small class="date"><i class="fa fa-calendar"></i>24 mar 2014</small>
							</div>
						</div>
						<div class="col-md-3 col-sm-6">
							<div class="news">
								<image class="news-image" src="images/news-thumb-3.jpg"></image>
								<h3 class="news-title"><a href="#">laboris nisi ut aliquip</a></h3>
								<small class="date"><i class="fa fa-calendar"></i>24 mar 2014</small>
							</div>
						</div>
						<div class="col-md-3 col-sm-6">
							<div class="news">
								<image class="news-image" src="images/news-thumb-4.jpg"></image>
								<h3 class="news-title"><a href="#">laboris nisi ut aliquip</a></h3>
								<small class="date"><i class="fa fa-calendar"></i>24 mar 2014</small>
							</div>
						</div>
					</div> <!-- .row -->
				</div> <!-- .container -->
			</div> <!-- section -->

			<div class="fullwidth-block">
				<div class="container">
					@yield('main_body')
					 <!-- .row -->
				</div> <!-- .container -->
			</div> <!-- section -->
		</main> <!-- .main-content -->

		<footer class="site-footer">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<div class="widget">
							<h3 class="widget-title">Our address</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi perspiciatis magnam, ab ipsa laboriosam tempore tenetur, aliquid repellat, ex cum dicta reiciendis accusamus. Omnis repudiandae quasi mollitia, iusto odio dignissimos.</p>
							<ul class="address">
								<li><i class="fa fa-map-marker"></i> 329 Church St, Garland, TX 75042</li>
								<li><i class="fa fa-phone"></i> (425) 853 442 552</li>
								<li><i class="fa fa-envelope"></i> info@yourchurch.com</li>
							</ul>
						</div>
					</div>
					<div class="col-md-4">
						<div class="widget">
							<h3 class="widget-title">Topics from last meeting</h3>
							<ul class="bullet">
								<li><a href="#">Lorem ipsum dolor sit amet</a></li>
								<li><a href="#">Consectetur adipisicing elit quis nostrud</a></li>
								<li><a href="#">Eiusmod tempor incididunt ut labore et dolore magna</a></li> 
								<li><a href="#">Ut enim ad minim veniam cillum</a></li>
								<li><a href="#">Exercitation ullamco laboris nisi ut aliquip</a></li> 
								<li><a href="#">Duis aute irure dolor in reprehenderit in voluptate</a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-4">
						<div class="widget">
							<h3 class="widget-title">Contact form</h3>
							<form action="#" class="contact-form">
								<div class="row">
									<div class="col-md-6"><input type="text" placeholder="Your name..."></div>
									<div class="col-md-6"><input type="text" placeholder="Email..."></div>
								</div>
								
								<textarea name="" placeholder="Your message..."></textarea>
								<div class="text-right"><input type="submit" value="Send message"></div>
								
							</form>
						</div>
					</div>
				</div> <!-- .row -->

				<p class="colophon">Copyright 2014 True Church. All right reserved</p>
			</div><!-- .container -->
		</footer> <!-- .site-footer -->

	</div>
	

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/plugins.js"></script>
	<script src="js/app.js"></script>
	
</body>

</html>