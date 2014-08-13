<div id="content">
	<div class="container floated">
		<div class="sixteen floated page-title">
			<h2><?php echo $breadcrumbs_list[2]; ?></h2>
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
			<article class="post">
				<figure class="post-img">
					<a href="javascript:void(0);">
						<?php
							$media = explode('|',$content['content_media']);
							if($media[0] === 'image'){
								echo '<img alt="" src="'.base_url('/assets/images/'.$media[1]).'">';
							} else {
								//
							}
						?>
					</a>
				</figure>
				<section class="date">
					<span class="day"><?php echo $content['d']; ?></span>
					<span class="month"><?php echo $content['m']; ?></span>
				</section>
				<section class="post-content">
					<header class="meta">
						<h2><a href="<?php echo site_url(strtolower($breadcrumbs_list[2]).'/'.$content['content_alias_name']); ?>"><?php echo $content['content_header']; ?></a></h2>
						<span><i class="halflings user"></i>By <a href="javascript:void(0);"><?php echo $content['created_by']; ?></a></span>
						<!--span><i class="halflings tag"></i><a href="#">Boating</a>, <a href="#">Recreation</a></span>
						<span><i class="halflings comments"></i>With <a href="#">12 Comments</a></span-->
					</header>
					<p><?php echo $content['content_body']; ?></p>
				</section>
			</article>
			<div class="line"></div>
		</div>
		<div class="four floated sidebar right">
			<aside class="sidebar">
				<nav class="widget">
					<h4>Archives</h4>
					<ul class="categories">
						<?php
							foreach($archives_list as $key => $value):
								echo '<li><a href="'.site_url(strtolower($breadcrumbs_list[2]).'/archives/'.strtolower(str_replace(' ', '-', $value['archives']))).'">'.$value['archives'].'</a></li>';
								//echo '<li><a href="javascript:void(0);">'.$value['archives'].'</a></li>';
							endforeach;
						?>
					</ul>
				</nav>
			</aside>
		</div>
	</div>
</div>