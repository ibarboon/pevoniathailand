<div id="content">
	<div class="container floated">
		<div class="sixteen floated page-title">
			<h2>Why Pevonia</h2>
			<nav id="breadcrumbs">
				<ul>
					<li>You are here:</li>
					<li><a href="<?php echo site_url($default_language.'/home'); ?>">Home</a></li>
					<li>Why Pevonia</li>
				</ul>
			</nav>
		</div>
	</div>
	<div class="page-content">
		<div class="container">
			<div class="sixteen columns">
				<?php
					if ($why_pevonia['content_media'] !== NULL) {
						$media = explode('|', $why_pevonia['content_media']);
						if ($media[0] === 'image') {
				?>
				<section class="flexslider" style="height: 450px;">
					<ul class="slides">
						<?php
							foreach (explode(',', $media[1]) as $key => $value) {
						?>
						<li>
							<img alt="" src="<?php echo base_url('assets/images/'.$value); ?>">
						</li>
						<?php } /*END FOREACH */ ?>
					</ul>
					<ul class="flex-direction-nav">
						<li>
							<a href="#" class="flex-prev">Previous</a>
						</li>
						<li>
							<a href="#" class="flex-next">Next</a>
						</li>
					</ul>
				</section>
				<?php } ?>
				<?php } ?>
				<br>
				<p><?php echo str_replace('|', '', $why_pevonia['content_body']); ?></p>
			</div>
		</div>
	</div>
</div>