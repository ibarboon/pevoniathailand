<div id="content">
	<div class="container floated">
		<div class="sixteen floated page-title">
			<h2><?php echo $product_type['sub_type_name']; ?></h2>
			<nav id="breadcrumbs">
				<ul>
					<li>You are here:</li>
					<li><a href="<?php echo site_url('home'); ?>">Home</a></li>
					<li><?php echo $product_type['type_name']; ?></li>
					<li><?php echo $product_type['sub_type_name']; ?></li>
				</ul>
			</nav>
		</div>
	</div>
	<div class="container floated">
		<div class="eleven floated">
			<div class="shop-page page-content">
				<div id="portfolio-wrapper">
					<?php foreach($product_list as $product):?>
					<div class="four-shop columns isotope-item">
						<div class="shop-item">
							<figure>
								<a href="<?php echo site_url($product_type['type_alias_name'].'/'.$product_type['sub_type_alias_name'].'/'.$product['href']); ?>">
									<img src="<?php echo base_url('/assets/images/products/'.$product['product_image']); ?>" alt="" />
								</a>
								<figcaption class="item-description">
									<a href="<?php echo site_url($product_type['type_alias_name'].'/'.$product_type['sub_type_alias_name'].'/'.$product['href']); ?>"><h5><?php echo $product['display_name']; ?></h5></a>
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
					<h4><?php echo $product_type['type_name']; ?></h4>
					<ul class="categories">
						<?php foreach($product_type_list as $pt): ?>
						<li><a href="<?php echo site_url($product_type['type_alias_name'].'/'.$pt['alias_name']); ?>"><?php echo $pt['display_value']; ?></a></li>
						<?php endforeach; ?>
					</ul>
				</nav>
			</aside>
		</div>
	</div>
</div>