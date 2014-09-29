<div id="content">
	<div class="container floated">
		<div class="sixteen floated page-title">
			<h2>Pevonia Spas</h2>
			<nav id="breadcrumbs">
				<ul>
					<?php foreach($breadcrumbs_list as $breadcrumbs):?>
					<li><?php echo $breadcrumbs; ?></li>
					<?php endforeach; ?>
				</ul>
			</nav>
		</div>
	</div>
	<div class="container floated">
		<div class="eleven floated">
			<div class="page-content">
				<div class="toggle-wrap">
					<span class="trigger opened"><a href="#"><i class="toggle-icon"></i> What is a Premium Theme? </a></span>
					<div class="toggle-container">
						<div class="four columns">
							<img alt="" src="<?php echo base_url('assets/images/portfolio/portfolio-01.jpg'); ?>">
						</div>
						<div class="six columns">
							<p>Perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam. Donec ut volutpat metus. Vivamus justo arcu, elementum a sollicitudin pellentesque, tincidunt ac enim. Proin id arcu ut ipsum vestibulum elementum.</p>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="toggle-wrap">
					<span class="trigger"><a href="#"><i class="toggle-icon"></i> How much does it cost?</a></span>
					<div class="toggle-container">
						<div class="four columns">
							<img alt="" src="<?php echo base_url('assets/images/portfolio/portfolio-01.jpg'); ?>">
						</div>
						<div class="six columns">
							<p>Perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam. Donec ut volutpat metus. Vivamus justo arcu, elementum a sollicitudin pellentesque, tincidunt ac enim. Proin id arcu ut ipsum vestibulum elementum.</p>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="four floated sidebar right">
			<aside class="sidebar">
				<nav class="widget-search">
					<form method="get" action="#">
						<button class="search-btn-widget"></button>
						<input type="text" value="Search" onfocus="if(this.value=='Search')this.value='';" onblur="if(this.value=='')this.value='Search';" class="search-field">
					</form>
				</nav>
				<div class="clearfix"></div>
				<nav class="widget">
					<h4>Pevonia Spas</h4>
					<ul class="categories">
						<?php
							foreach($archives_list as $key => $value) {
								echo '<li><a href="'.site_url($default_language.'/'.strtolower($breadcrumbs_list[2]).'/archives/'.strtolower(str_replace(' ', '-', $value['archives']))).'">'.$value['archives'].'</a></li>';
							}
						?>
					</ul>
				</nav>
			</aside>
		</div>
	</div>
</div>