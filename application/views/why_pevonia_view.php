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
					if ($content['content_media'] !== NULL) {
						$media = explode('|', $content['content_media']);
						if ($media[0] === 'image') {
				?>
				<img alt="" src="<?php echo base_url('assets/images/'.$media[1]); ?>">
				<?php } ?>
				<?php } ?>
				<br>
				<p><?php echo $content['content_body']; ?></p>
			</div>
		</div>
	</div>
</div>