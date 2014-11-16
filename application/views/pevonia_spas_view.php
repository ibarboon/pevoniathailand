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
				<?php
					foreach ($content_list as $key => $value) {
						$attr = ($key == 0)? 'opened': NULL;
				?>
					<div class="toggle-wrap">
						<span class="trigger <?php echo $attr; ?>"><a href="#"><i class="toggle-icon"></i> <?php echo $value['content_header']; ?></a></span>
						<div class="toggle-container">
							<div class="four columns">
								<?php
									$media = explode('|',$value['content_media']);
									if($media[0] === 'image'){
										echo '<img alt="" src="'.base_url('/assets/images/'.$media[1]).'">';
									} else {
										//
									}
								?>
							</div>
							<div class="six columns">
								<p><?php echo $value['content_body']; ?></p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				<?php } ?>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="four floated sidebar right">
			<aside class="sidebar">
				<nav class="widget">
					<h4>Pevonia Spas</h4>
					<ul class="categories">
						<?php
							foreach($spas_list as $key => $value) {
								echo '<li><a href="javascript: void(0);">'.$value['spa'].'</a></li>';
							}
						?>
					</ul>
				</nav>
			</aside>
		</div>
	</div>
</div>