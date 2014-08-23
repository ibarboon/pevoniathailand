<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="">
	    <meta name="author" content="">
	    <title>Full Slider - Start Bootstrap Template</title>
	    <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
	     <link href="<?php echo base_url('assets/css/full-slider.css') ?>" rel="stylesheet">
	    <!--[if lt IE 9]>
	        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	    <![endif]-->
	</head>
	<body>
	    <header id="myCarousel" class="carousel slide">
	        <ol class="carousel-indicators">
	            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
	            <li data-target="#myCarousel" data-slide-to="1"></li>
	        </ol>
	        <div class="carousel-inner">
	            <div class="item active">
	                <div class="fill" style="background-image:url('<?php echo base_url('assets/images/test-intro-page.jpg'); ?>');"></div>
	                <div class="carousel-caption">
	                    <h2>Caption 1</h2>
	                    <p>Caption 1</p>
	                </div>
	            </div>
	            <div class="item">
	                <div class="fill" style="background-image:url('<?php echo base_url('assets/images/test-intro-page.jpg'); ?>');"></div>
                	   <div class="carousel-caption">
	                    <h2>Caption 2</h2>
	                    <p>Caption 2</p>
	                </div>
	            </div>
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
	    <script src="js/bootstrap.min.js"></script>
	    <script>
		    $('.carousel').carousel({
		        interval: 5000 //changes the speed
		    })
	    </script>
	</body>
</html>