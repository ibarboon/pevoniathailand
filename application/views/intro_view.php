<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="<?php echo $html_meta['description']; ?>">
	    <meta name="author" content="">
	    <title><?php echo $html_meta['title']; ?></title>
	    <link rel="shortcut icon" href="<?php echo base_url('assets/images/'.$html_meta['shortcut_icon']) ?>">
	    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
	    <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>">
     	<link rel="stylesheet" href="<?php echo base_url('assets/css/full-slider.css') ?>">
     	<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/css/colors/celadon.css'); ?>" id="colors">
	    <!--[if lt IE 9]>
	        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	    <![endif]-->
	</head>
	<body>
		<header id="myCarousel" class="carousel slide">
			<ol class="carousel-indicators">
				<?php
				foreach ($carousel_list as $carousel_id => $carousel) {
					$attr = ($carousel_id == 0) ? ' class="active"': NULL;
					echo '<li data-target="#myCarousel" data-slide-to="'.$carousel_id.'"'.$attr.'></li>';
				}
			?>
			</ol>
			<div class="carousel-inner">
				<?php
					foreach ($carousel_list as $carousel_id => $carousel) {
						$attr = ($carousel_id == 0) ? ' active': NULL;
				?>
				<div class="item<?php echo $attr; ?>">
					<div class="fill" style="background-image:url('<?php echo base_url('assets/images/'.$carousel['option_value']); ?>');"></div>
					<div class="carousel-caption">
						<p>
							<?php
								foreach ($social_network_list as $social_network_id => $social_network) {
								if (strrpos($social_network['option_value'], '|')) {
									$sn = explode('|', $social_network['option_value']);
								}
							?>
							<a class="button light" href="<?php echo $sn[1]; ?>" role="button"><i class="<?php echo $sn[0]; ?>"></i> <?php echo strtoupper($social_network['option_key']); ?></a>
							<?php } ?>
						</p>
						<p>
							<a class="button color" href="<?php echo site_url('home')?>" role="button">เข้าเว็บไซต์</a>
							<a class="button color" href="<?php echo site_url('home')?>" role="button">Enter Website</a>
						</p>
					</div>
				</div>
				<?php } ?>
			</div>
			<a class="left carousel-control" href="#myCarousel" data-slide="prev">
				<span class="icon-prev"></span>
			</a>
			<a class="right carousel-control" href="#myCarousel" data-slide="next">
				<span class="icon-next"></span>
			</a>
		</header>
		<script src="<?php echo base_url('assets/scripts/jquery-1.11.0.js')?>"></script>
		<script src="<?php echo base_url('assets/scripts/bootstrap.min.js')?>"></script>
		<script>
			$('.carousel').carousel({ interval: 5000 });
	    </script>
	</body>
</html>