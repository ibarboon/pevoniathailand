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
<!-- 				<div class="widget"> -->
<!-- 					<h4>Office Hours</h4> -->
<!-- 					<ul class="contact-details-alt hours"> -->
<!-- 						<li><i class="icon-time"></i>Monday - Friday <span class="hours">09.00 - 18.00</span></li> -->
<!-- 						<li><i class="icon-ban-circle"></i>Saturday - Sunday<span class="hours">Closed</span></li> -->
<!-- 					</ul> -->
<!-- 				</div> -->
				<div class="widget">
					<h4><?php echo $how_to_order['content_header']; ?></h4>
					<ul class="check-list">
						<?php
							$item_list = explode('|',$how_to_order['content_body']);
							foreach ($item_list as $item) {
								echo '<li>'.$item.'</li>';
							}
						?>
					</ul>
				</div>
				<div class="widget">
					<h4><?php echo $payment_channel['content_header']; ?></h4>
					<ul>
						<?php
							$item_list = explode('|',$payment_channel['content_body']);
							foreach ($item_list as $item) {
								echo '<li>'.$item.'</li>';
							}
						?>
					</ul>
				</div>
			</aside>
		</div>
		<div class="ten floated right" style="min-height: 700px;">
			<section class="page-content">
				<h3 class="margin-reset">Our Location</h3>
				<br>
				<?php
					$media = explode('|',$our_location['content_media']);
					if($media[0] === 'image') {
						echo '<a href="'.base_url('/assets/images/'.$media[1]).'" rel="fancybox-gallery">';
						echo '<img alt="" src="'.base_url('/assets/images/'.$media[1]).'">';
						echo '</a>';
					}
				?>
				<div class="clearfix"></div>
			</section>
		</div>
	</div>
</div>