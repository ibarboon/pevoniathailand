<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Contents</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo site_url('backend/dashboard');?>"><span class="glyphicon glyphicon-dashboard"></span>&nbsp;Dashboard</a></li>
			<li class="active"><span class="glyphicon glyphicon-file"></span>&nbsp;Contents</li>
		</ol>
		<?php if ($action !== 'add') { ?>
		<p class="text-right">
			<a id="btn-edit" class="btn btn-default">
				<span class="glyphicon glyphicon-edit"></span>&nbsp;Edit Content
			</a>
		</p>
		<?php } ?>
		<!-- pre><?php print_r($content); ?></pre-->
		<?php
			if ($action === 'add') {
				$action_link = site_url('backend/contents/do_add');
			} else {
				$action_link = site_url('backend/contents/do_edit');
			}
		?>
		<form accept-charset="utf-8" action="<?php echo $action_link; ?>" class="form-horizontal" enctype="multipart/form-data" method="post" role="form">
			<input type="hidden" name="input-action" value="<?php echo $action; ?>">
			<input type="hidden" name="input-row-id" value="<?php echo (isset($content['row_id']))? $content['row_id'] : NULL;?>">
			<input type="hidden" name="input-old-content-media" value="<?php echo (isset($content['content_media']))? $content['content_media'] : NULL;?>">
			<div class="form-group">
				<label class="col-sm-3 control-label" for="input-content-type">Content Type : </label>
				<div class="col-sm-4">
					<select class="form-control" name="input-content-type" id="input-content-type">
						<option value="">Select Content Type</option>
						<?php
							$content_type_list = array('activities', 'news', 'pevonia-spas', 'q-and-a');
							foreach ($content_type_list as $content_type) {
						?>
						<option value="<?php echo $content_type; ?>" <?php echo (isset($content['content_type']) AND $content_type == $content['content_type'])? 'selected' : NULL;?>>
							<?php echo $content_type; ?>
						</option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label" for="input-content-language">Content Language</label>
				<div class="col-sm-4">
					<label class="radio-inline">
						<input type="radio" name="input-content-language" value="en" checked="checked"> EN
					</label>
					<label class="radio-inline">
						<input type="radio" name="input-content-language" value="th" <?php echo (isset($content['content_language']) AND $content['content_language'] == 'th')? 'checked="checked"' : NULL;?>> TH
					</label>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label" for="input-content-header">Content Header</label>
				<div class="col-sm-4">
					<input type="text" name="input-content-header" id="input-content-header"  placeholder="Content Header" class="form-control" value="<?php echo (isset($content['content_header']))? $content['content_header'] : NULL;?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label" for="input-content-body">Content Body</label>
				<div class="col-sm-4">
					<textarea class="form-control" rows="8" name="input-content-body" id="input-content-body"><?php echo (isset($content['content_header']))? $content['content_body'] : NULL;?></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Content Media</label>
				<div class="col-sm-4">
					<input type="file" name="userfile">
					<?php
						if ($action === 'view') {
							$media = explode('|',$content['content_media']);
							if($media[0] === 'image'){
								echo '<img alt="" src="'.base_url('/assets/images/'.$media[1]).'">';
							}
						}
					?>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-3 col-sm-9">
					<button class="btn btn-primary" type="submit">Submit</button>
				</div>
			</div>
		</form>
	</div>
</div>