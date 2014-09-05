<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<title>Pevonia Thailand</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="stylesheet" href="<?php echo base_url('/assets/css/style.css'); ?>">
		<link rel="stylesheet" href="<?php echo base_url('/assets/css/font-awesome.min.css'); ?>">
		<link rel="stylesheet" href="<?php echo base_url('/assets/css/colors/celadon.css'); ?>" id="colors">
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<script src="<?php echo base_url('/assets/scripts/jquery.min.js'); ?>"></script>
		<script src="<?php echo base_url('/assets/scripts/jquery.flexslider.js'); ?>"></script>
		<script src="<?php echo base_url('/assets/scripts/jquery.selectnav.js'); ?>"></script>
		<script src="<?php echo base_url('/assets/scripts/jquery.twitter.js'); ?>"></script>
		<script src="<?php echo base_url('/assets/scripts/jquery.modernizr.js'); ?>"></script>
		<script src="<?php echo base_url('/assets/scripts/jquery.easing.1.3.js'); ?>"></script>
		<script src="<?php echo base_url('/assets/scripts/jquery.contact.js'); ?>"></script>
		<script src="<?php echo base_url('/assets/scripts/jquery.isotope.min.js'); ?>"></script>
		<script src="<?php echo base_url('/assets/scripts/jquery.jcarousel.js'); ?>"></script>
		<script src="<?php echo base_url('/assets/scripts/jquery.fancybox.min.js'); ?>"></script>
		<script src="<?php echo base_url('/assets/scripts/jquery.transit-modified.js'); ?>"></script>
		<script src="<?php echo base_url('/assets/scripts/jquery.layerslider-transitions.js'); ?>"></script>
		<script src="<?php echo base_url('/assets/scripts/jquery.layerslider.min.js'); ?>"></script>
		<script src="<?php echo base_url('/assets/scripts/jquery.shop.js'); ?>"></script>
		<script src="<?php echo base_url('/assets/scripts/custom.js'); ?>"></script>
	</head>
	<body>
		<div id="wrapper">
			<div id="top-line"></div>
			<div class="container">

	<!-- Header -->
	<header id="header">

		<!-- Logo -->
		<div class="ten columns">
			<div id="logo">
				<h1><a href="<?php echo site_url('/'); ?>"><img src="<?php echo base_url('/assets/images/temp-logo.png'); ?>" alt="Pevonia Thailand" /></a></h1>
<!-- 				<div id="tagline">Template Without Compromises!</div> -->
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="six columns">
			<ul class="social-icons">
				<li class="twitter"><a href="#">Twitter</a></li>
				<li class="facebook"><a href="#">Facebook</a></li>
				<li class="dribbble"><a href="#">Dribbble</a></li>
				<li class="linkedin"><a href="#">LinkedIn</a></li>
				<li class="rss"><a href="#">RSS</a></li>
			</ul>
<!-- 			<br> -->

<!-- 			<div class="clearfix"></div> -->

<!-- 			<div class="contact-details">Contact Phone: +48 880 440 110</div> -->

<!-- 			<div class="clearfix"></div> -->

			<!-- Search -->
			<nav class="top-search">
				<form method="get" action="404-page.html">
					<button class="search-btn"></button>
					<input type="text" value="Search" onfocus="if(this.value=='Search')this.value='';" onblur="if(this.value=='')this.value='Search';" class="search-field">
				</form>
			</nav>

		</div>
	</header>

	<div class="clearfix"></div>

</div>
			<nav id="navigation" class="style-1">
				<div class="left-corner"></div>
				<div class="right-corner"></div>
				<ul class="menu" id="responsive">
					<?php
						foreach($menu_list as $key => $value):
							$attr = ($current_view === $key)? ' id="current"': NULL;
							if(is_array($value)) {
								echo '<li><a href="javascript:void(0);"'.$attr.'>'.$value['display_value'].'</a><ul>';
								foreach($value['sub_menu'] as $sub_menu):
									echo '<li><a href="'.site_url($key.'/'.$sub_menu['href']).'">'.$sub_menu['display_value'].'</a></li>';
								endforeach;
								echo '</ul></li>';
							} else {
								echo '<li><a href="'.site_url($key).'"'.$attr.'>'.$value.'</a></li>';
							}
						endforeach;
					?>
				</ul>
			</nav>
			<div class="clearfix"></div>