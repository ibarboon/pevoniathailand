<div id="content">
	<div class="container floated">
		<div class="sixteen floated page-title">
			<h2>Search</h2>
		</div>
	</div>
	<div class="page-content">
		<div class="container">
			<div class="sixteen columns">
				<div class="notification notice" style="display: block;">
					<p><span>Notice!</span> <?php echo count($search_list); ?> row(s) returned</p>
				</div>
				<?php
					foreach ($search_list as $search_item) {
						$action_link = $default_language.'/'.$search_item['content_type'].'/';
						$action_link .= ($search_item['content_type'] === 'pevonia-spas')? NULL: $search_item['content_alias_name'];
				?>
				<h3><a href="<?php echo site_url($action_link);?>"><?php echo $search_item['content_alias_name']; ?></a></h3>
				<p><?php echo str_replace($keyword, '<span class="highlight color">'.$keyword.'</span>',$search_item['content_body']); ?></p>
				<div style="margin-top: 20px; margin-bottom: 20px;" class="line"></div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>