<div id="content">
	<div class="container floated">
		<div class="sixteen floated page-title">
			<h2>Q&A</h2>
			<nav id="breadcrumbs">
				<ul>
					<li>You are here:</li>
					<li><a href="<?php echo site_url('home'); ?>">Home</a></li>
					<li>Q&A</li>
				</ul>
			</nav>
		</div>
	</div>
	<div class="page-content">
		<div class="container">
			<div class="two-thirds column">
				<?php
					foreach($qa_list as $key => $value):
					$attr = ($key === 0)? ' opened': NULL;
				?>
				<div class="toggle-wrap">
					<span class="trigger <?php echo $attr; ?>"><a href="#"><i class="toggle-icon"></i> <?php echo $value['qa_question']; ?> </a></span>
					<div class="toggle-container">
						<div class="four columns">
							<a href="<?php echo base_url('/assets/images/qa/'.$value['qa_image']); ?>" rel="fancybox-gallery">
								<img src="<?php echo base_url('/assets/images/qa/'.$value['qa_image']); ?>"/ style="border: 1px solid #E0E0E0;">
							</a>
						</div>
						<div class="five columns">
							<p><?php echo $value['qa_answer']; ?></p>
						</div>
						<div class="clearfix"></div>
						<br>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
			<div class="one-third column">
				<div class="large-notice">
					<h2>Don't See the <br /> Answer You Need?</h2>
					<p>If you don't see the answer for your question send us a message and we will answer you as soon as possible, within a few hours.</p>
					<a href="Javascript: void(0);" class="button medium color">Contact Us</a>
				</div>
			</div>
		</div>
	</div>
</div>