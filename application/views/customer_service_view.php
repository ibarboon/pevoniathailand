<div id="content">
	<div class="container floated">
		<div class="sixteen floated page-title">
			<h2>Customer Service</h2>
			<nav id="breadcrumbs">
				<ul>
					<li>You are here:</li>
					<li><a href="<?php echo site_url('home'); ?>">Home</a></li>
					<li>Customer Service</li>
				</ul>
			</nav>
		</div>
	</div>
	<div class="container floated">
		<div class="five floated sidebar left">
			<aside class="sidebar padding-reset">
				<div class="widget">
					<h4>Contact Details</h4>
					<ul class="contact-details-alt">
					<?php
						foreach($contact_list as $contact):
							if(strpos($contact['option_value'],'|')) {
								$display_value = explode('|', $contact['option_value']);
								echo '<li><i class="'.$display_value[0].'"></i><p><strong style="color: inherit;">'.$contact['option_key'].'</strong>'.$display_value[1].'</p></li>';							
							}
						endforeach;
					?>
					</ul>
				</div>
				<div class="widget">
					<h4>Office Hours</h4>
					<ul class="contact-details-alt hours">
						<li><i class="icon-time"></i>Monday - Friday <span class="hours">09.00 - 18.00</span></li>
						<li><i class="icon-ban-circle"></i>Saturday - Sunday<span class="hours">Closed</span></li>
					</ul>
				</div>
			</aside>
		</div>
		<div class="ten floated right">
			<section class="page-content">
				<h3 class="margin-reset">Our Location</h3>
				<br>
				<a href="<?php echo base_url('/assets/images/office_map.jpg'); ?>" rel="fancybox-gallery">
					<img src="<?php echo base_url('/assets/images/office_map.jpg'); ?>"/>
				</a>
				<!--section class="google-map-container">
					<div id="googlemaps" class="google-map google-map-full" style="padding-bottom: 100%"></div>
					<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
					<script src="<?php echo base_url('/assets/scripts/jquery.gmap.min.js'); ?>"></script>
					<script type="text/javascript">
						$('#googlemaps').gMap({
							maptype: 'ROADMAP',
							scrollwheel: false,
							zoom: 16,
							markers: [
								{
									latitude: 13.802971,
									longitude: 100.450342,
									popup: false,
								}
							]
						});
					</script>
				</section-->
			</section>
		</div>
	</div>
</div>