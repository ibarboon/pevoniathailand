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
				<div class="widget">
					<h4>How to Order</h4>
					<ul class="check-list">
						<li>Call direct : 02-489-4955-7, +66 2489 4955-7</li>
						<li>E-mail : info@pevoniathailand.com</li>
						<li>For more information https://www.facebook.com/pevoniathailand</li>
					</ul>
				</div>
				<div class="widget">
					<h4>Payment Channel</h4>
					<ul>
						<li>Bank of Ayudhya Public Company Limited.</li>
						<li>Branch : Seacon Bangkae (Saving Account)</li>
						<li>Name of Account : Pevonia (Thailand) Co., Ltd.</li>
						<li>Account No. 289-1-41017-1</li>
					</ul>
				</div>
			</aside>
		</div>
		<div class="ten floated right" style="min-height: 700px;">
			<section class="page-content">
				<h3 class="margin-reset">Our Location</h3>
				<br>
				<a href="<?php echo base_url('/assets/images/office_map.jpg'); ?>" rel="fancybox-gallery">
					<img src="<?php echo base_url('/assets/images/office_map.jpg'); ?>"/>
				</a>
				<div class="clearfix"></div>
			</section>
		</div>
	</div>
</div>