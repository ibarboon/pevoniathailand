<div id="content">
	<div class="container floated">
		<div class="sixteen floated page-title">
			<h2><?php echo $product['display_name']; ?></h2>
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
				<div class="six columns">
					<section class="flexslider shop">
						<a href="<?php echo base_url('/assets/images/products/'.$product['product_image']); ?>" rel="fancybox-gallery" title="">
							<img src="<?php echo base_url('/assets/images/products/'.$product['product_image']); ?>" alt="" />
						</a>
					</section>
				</div>
				<div class="five columns">
					<div class="product-info">
						<h3 class="title"><?php echo $product['display_name']; ?></h3>
						<p><?php echo $product['product_description']; ?></p>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="clearfix"></div>
				<br />
				<div class="eleven columns">
					<ul class="tabs-nav">
						<li class="active"><a href="#tab1">Description</a></li>
						<li><a href="#tab2">Additional Information</a></li>
					</ul>
					<div class="tabs-container">
						<div class="tab-content" id="tab1">
							<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
							<p>
								<ul class="check-list">
									<li>Justo duo dolores et ea rebum</li>
									<li>Duis autem vel eum iriure dolor</li>
									<li>Stet clita kasd gubergren</li>
								</ul>
							</p>
							<p>In hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
						</div>
						<div class="tab-content" id="tab2">
							<table class="standard-table shop">
								<tr>
									<th>Key#1</th>
									<td>Value#1</td>
								</tr>
								<tr>
									<th>Key#2</th>
									<td>Value#2</td>
								</tr>
								<tr>
									<th>Key#3</th>
									<td>Value#3</td>
								</tr>
								<tr>
									<th>Key#4</th>
									<td>Value#4</td>
								</tr>
								<tr>
									<th>Key#5</th>
									<td>Value#5</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
				<div style="margin-top: -10px;"></div>
			</div>
		</div>
		<div class="four floated sidebar right">
			<aside class="sidebar">
				<nav class="widget">
					<h4><?php echo $current_view; ?></h4>
					<ul class="categories">
						<?php foreach($product_type_list as $key => $value): ?>
						<li><a href="<?php echo site_url($current_view.'/'.$value['alias_name']); ?>"><?php echo $value['display_value']; ?></a></li>
						<?php endforeach; ?>
					</ul>
				</nav>
			</aside>
		</div>
	</div>
</div>