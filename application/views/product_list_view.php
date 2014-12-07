<div id="content">
	<div class="container floated">
		<div class="sixteen floated page-title">
			<h2><?php echo $product_class['product_class_name_en']; ?></h2>
			<nav id="breadcrumbs">
				<ul>
					<li>You are here:</li>
					<li><a href="<?php echo site_url('home'); ?>">Home</a></li>
					<li><?php echo $product_class['product_class_name_en']; ?></li>
				</ul>
			</nav>
		</div>
	</div>
	<div class="container floated">
		<div class="eleven floated">
			<div class="shop-page page-content">
				<div id="portfolio-wrapper">
					<?php
						$pre_url = $default_language.'/'.implode('/', $breadcrumbs_list);
						foreach($product_list as $product):
					?>
					<div class="four-shop columns isotope-item">
						<div class="shop-item">
							<figure>
								<?php
									if (strpos($product['product_image'], '|')) {
										$image_list = explode('|', $product['product_image']);
										$img_src = $image_list[0];
									} else {
										$img_src = $product['product_image'];
									}
								?>
								<a href="javascript:void(0);">
									<img src="<?php echo base_url('/assets/images/products/'.$img_src); ?>" alt="" />
								</a>
								<figcaption class="item-description">
									<a href="<?php echo site_url($default_language.'/'.$mapping_value.'/'.$product['row_id']); ?>"><h5><?php echo $product['product_name_'.$default_language]; ?></h5></a>
								</figcaption>
							</figure>
						</div>
					</div>
					<?php endforeach; ?>
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