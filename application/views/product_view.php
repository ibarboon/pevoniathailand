<div id="content">
	<div class="container floated">
		<div class="sixteen floated page-title">
			<h2><?php echo $product['product_name_'.$default_language]; ?></h2>
			<nav id="breadcrumbs">
				<ul>
					<li>You are here:</li>
					<li><a href="<?php echo site_url('home'); ?>">Home</a></li>
					<li><?php echo $current_view; ?></li>
				</ul>
			</nav>
		</div>
	</div>
	<div class="container floated">
		<div class="eleven floated">
			<div class="shop-page page-content">
				<div class="container">
					<div class="six columns">
						<section class="flexslider shop">
							<ul class="slides">
								<?php foreach ($product_image_list as $product_image) { ?>
								<li>
									<a href="<?php echo base_url('/assets/images/products/'.$product_image); ?>" rel="fancybox-gallery" title="">
										<img src="<?php echo base_url('/assets/images/products/'.$product_image); ?>" alt="" />
									</a>
								</li>
								<?php } ?>
							</ul>
						</section>
					</div>
					<div class="five columns">
						<div class="product-info">
							<h3 class="product_title entry-title" itemprop="name"><?php echo $product['product_name_'.$default_language]; ?></h3>
							<p style="word-wrap: break-word;"><?php echo nl2br($product['product_detail_'.$default_language]); ?></p>
							<div class="clearfix"></div>
						</div>
					</div>
					<div class="clearfix"></div>
					<br />
					<div class="eleven columns">
						<ul class="tabs-nav">
							<li class="active"><a href="#tab1">Benefit</a></li>
							<li><a href="#tab2">Usage</a></li>
							<li><a href="#tab3">Key Ingredient</a></li>
						</ul>
						<div class="tabs-container">
							<div class="tab-content" id="tab1">
								<p>
									<?php
										if (strpos($product['benefit_'.$default_language], '|') !== FALSE) {
											$benefit_list = explode('|', $product['benefit_'.$default_language]);
											echo '<ul class="check-list">';
											foreach ($benefit_list as $benefit) {
												echo "<li>$benefit</li>";
											}
											echo '</ul>';
										} else {
											echo nl2br($product['benefit_'.$default_language]);
										}
									?>
								</p>
							</div>
							<div class="tab-content" id="tab2">
								<p>
									<?php
										if (strpos($product['usage_'.$default_language], '|') !== FALSE) {
											$usage_list = explode('|', $product['usage_'.$default_language]);
											echo '<ul class="check-list">';
											foreach ($usage_list as $usage) {
												echo "<li>$usage</li>";
											}
											echo '</ul>';
										} else {
											echo nl2br($product['usage_'.$default_language]);
										}
									?>
								</p>
							</div>
							<div class="tab-content" id="tab3">
								<p>
									<?php
										if (strpos($product['key_ingredient_'.$default_language], '|') !== FALSE) {
											$key_ingredient_list = explode('|', $product['key_ingredient_'.$default_language]);
											echo '<ul class="check-list">';
											foreach ($key_ingredient_list as $key_ingredient) {
												echo "<li>$key_ingredient</li>";
											}
											echo '</ul>';
										} else {
											echo nl2br($product['key_ingredient_'.$default_language]);
										}
									?>
								</p>
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
					<div style="margin-top: -10px;"></div>
				</div>
			</div>
		</div>
		<div class="four floated sidebar right">
			<aside class="sidebar">
				<nav class="widget">
					<h4><?php echo $product_class['product_class_name_en']; ?></h4>
					<ul class="categories">
						<?php foreach($product_type_list as $product_type): ?>
						<li>
							<a href="<?php echo site_url($default_language.'/'.$mapping_value.'/'.$product_type['product_type_alias_name']); ?>">
								<?php echo $product_type['product_type_name_en']; ?>
							</a>
						</li>
						<?php endforeach; ?>
					</ul>
				</nav>
				<nav class="widget">
					<h4>Download Lists</h4>
					<ul class="categories">
						<?php foreach ($download_list as $download_item) { ?>
						<li><a href="<?php echo base_url('/assets/download/'.$download_item['option_value']); ?>" target="_blank"><?php echo $download_item['option_value']; ?></a></li>
						<?php } ?>
					</ul>
				</nav>
			</aside>
		</div>
	</div>
</div>