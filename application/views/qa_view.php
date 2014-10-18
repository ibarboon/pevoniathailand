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
	<div class="container floated">
		<div class="eleven floated">
			<?php foreach($qa_list as $qa) { ?>
				<article class="post">
					<figure class="post-img">
						<a href="javascript:void(0);">
							<?php echo '<img alt="" src="'.base_url('/assets/images/'.$qa['qa_image']).'">'; ?>
						</a>
					</figure>
					<section class="date">
						<span class="day"><?php echo $qa['qa_d']; ?></span>
						<span class="month"><?php echo $qa['qa_m']; ?></span>
					</section>
					<section class="post-content">
						<header class="meta">
							<h2><?php echo $qa['qa_question']; ?></h2>
							<span><i class="halflings user"></i>By <a href="javascript:void(0);"><?php echo $qa['created_by']; ?></a></span>
						</header>
						<p><?php echo $qa['qa_answer']; ?></p>
					</section>
				</article>
				<div class="line"></div>
			<?php } ?>
		</div>
		<div class="four floated sidebar right">
			<aside class="sidebar">
				<nav class="widget">
					<h4>Archives</h4>
					<ul class="categories">
						<?php
							foreach($archives_list as $key => $value) {
								echo '<li><a href="'.site_url($default_language.'/q-and-a/archives/'.strtolower(str_replace(' ', '-', $value['archives']))).'">'.$value['archives'].'</a></li>';
							}
						?>
					</ul>
				</nav>
			</aside>
		</div>
	</div>
</div>