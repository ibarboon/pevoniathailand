<div id="content">
	<section class="flexslider home">
		<ul class="slides">
			<?php foreach($slides as $slide) { ?>
			<li><a href="<?php echo $slide['option_value']; ?>"><img src="<?php echo base_url('/assets/images/slides/'.$slide['option_key']); ?>" alt="" /></a></li>
			<?php } ?>
		</ul>
	</section>
	<div class="container">
		<section class="icon-box-container">
			<div class="one-third column">
				<article class="icon-box">
					<h3>Why Pevonia</h3>
					<p>
						<?php
							if (strpos($why_pevonia['content_body'], '|')) {
								$p = explode('|', $why_pevonia['content_body']);
								echo $p[0];
							} else {
								echo $why_pevonia['content_body'];
							}
						?>
						<a href="<?php echo site_url($default_language.'/why-pevonia'); ?>"><?php echo ($default_language === 'en')? 'read more': 'อ่านต่อ'; ?></a>
					</p>
				</article>
			</div>
			<div class="one-third column">
				<article class="icon-box">
					<h3>News</h3>
					<p>
						<?php echo substr($news['content_body'], 0, 128); ?>
						<a href="<?php echo site_url($default_language.'/news'); ?>"><?php echo ($default_language === 'en')? 'read more': 'อ่านต่อ'; ?></a>
					</p>
				</article>
			</div>
			<div class="one-third column">
				<article class="icon-box">
					<iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fpevoniathailand&amp;width&amp;height=62&amp;colorscheme=light&amp;show_faces=false&amp;header=true&amp;stream=false&amp;show_border=true" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:62px;" allowTransparency="true"></iframe>
				</article>
			</div>
		</section>
	</div>
	<div class="container floated">
		<div class="blank floated">
			<section class="jcarousel recent-work-jc">
				<ul>
					<?php
						foreach($product_list as $product) {
							if (strpos($product['product_image'], '|')) {
								$image_list = explode('|', $product['product_image']);
								$img_src = $image_list[0];
							} else {
								$img_src = $product['product_image'];
							}
					?>
					<li class="four columns">
						<a href="<?php echo site_url($default_language.'/products/'.$product['row_id']); ?>" class="portfolio-item">
							<figure>
								<img src="<?php echo base_url('/assets/images/products/'.$img_src); ?>" alt="" />
								<figcaption class="item-description">
									<h5><?php echo $product['product_name_'.$default_language]; ?></h5>
									<!--<span>Photography</span> -->
								</figcaption>
							</figure>
						</a>
					</li>
					<?php } ?>
				</ul>
			</section>
		</div>
	</div>
	<div class="page-content">
		<div class="container">
			<?php
				foreach($home_content as $key => $value) {
					if (strpos($value['option_value'], '|')) {
						$section_detail = explode('|', $value['option_value']);
					}
			?>
			<div class="eight columns">
				<h3 class="margin-reset"><?php echo $section_detail[2]; ?></h3>
				<a href="<?php echo site_url($default_language.'/'.$section_detail[1]); ?>">
					<img alt="Pevonia Spa" src="<?php echo base_url('assets/images/'.$section_detail[0]); ?>">
				</a>
			</div>
			<?php } ?>
		</div>
	</div>
</div>