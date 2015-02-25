<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Setting</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo site_url('backend/dashboard');?>"><span class="glyphicon glyphicon-dashboard"></span>&nbsp;Dashboard</a></li>
			<li class="active"><span class="glyphicon glyphicon-cog"></span>&nbsp;Setting</li>
		</ol>
		<ul role="tablist" class="nav nav-tabs" id="setting-nav-tabs">
			<li class="active" role="presentation">
				<a aria-controls="general" data-toggle="tab" role="tab" id="general-tab" href="#general">General</a>
			</li>
			<li role="presentation">
				<a aria-controls="contact-information" data-toggle="tab" role="tab" id="contact-information-tab" href="#contact-information">Contact Information</a>
			</li>
			<li role="presentation">
				<a aria-controls="other" data-toggle="tab" role="tab" id="other-tab" href="#other">Other</a>
			</li>
		</ul>
		<div class="tab-content" id="setting-tab-content">
			<div aria-labelledby="general-tab" id="general" class="tab-pane fade in active" role="tabpanel">
				<br>
				<p class="text-right">
					<a class="btn btn-default btn-edit">
						<span class="glyphicon glyphicon-edit"></span>&nbsp;Edit
					</a>
				</p>
				<form role="form" class="form-horizontal" method="post" action="<?php echo site_url('backend/setting/do_edit_content'); ?>">
					<input type="hidden" name="input-action" value="<?php echo $action; ?>">
					<div class="form-group">
						<label class="col-sm-4 control-label" for="input-default-language">default_language :</label>
						<div class="col-sm-6">
							<label class="radio-inline">
								<input type="radio" name="language" value="en" <?php echo ($default_language_list[0]['option_value'] === 'en')? 'checked': NULL;?>> English
							</label>
							<label class="radio-inline">
								<input type="radio" name="language" value="th" <?php echo ($default_language_list[0]['option_value'] === 'th')? 'checked': NULL;?>> Thailand
							</label>
						</div>
					</div>
					<?php foreach ($html_meta_list as $html_meta) { ?>
					<div class="form-group">
						<label class="col-sm-4 control-label" for="<?php echo $html_meta['option_key']; ?>"><?php echo $html_meta['option_key']; ?> :</label>
						<div class="col-sm-6">
							<input type="text" name="<?php echo $html_meta['option_key']; ?>" id="<?php echo $html_meta['option_key']; ?>" placeholder="" class="form-control" value="<?php echo $html_meta['option_value']; ?>">
						</div>
					</div>
					<?php } ?>
					<?php
						foreach ($social_network_list as $social_network) {
							$attribute = explode('|', $social_network['option_value']);
					?>
					<div class="form-group">
						<label class="col-sm-4 control-label" for="<?php echo $social_network['option_key']; ?>"><?php echo $social_network['option_key']; ?> :</label>
						<div class="col-sm-6">
							<input type="text" name="<?php echo $social_network['option_key']; ?>" id="<?php echo $social_network['option_key']; ?>" placeholder="" class="form-control" value="<?php echo $attribute[1]; ?>">
						</div>
					</div>
					<?php } ?>
					<div class="form-group">
						<div class="col-sm-offset-4 col-sm-8">
							<button class="btn btn-primary" type="submit">Submit</button>
						</div>
					</div>
				</form>
			</div>
			<div aria-labelledby="contact-information-tab" id="contact-information" class="tab-pane fade" role="tabpanel">
				<br>
				<p class="text-right">
					<a class="btn btn-default btn-edit">
						<span class="glyphicon glyphicon-edit"></span>&nbsp;Edit
					</a>
				</p>
				<form role="form" class="form-horizontal" method="post" action="<?php echo site_url('backend/setting/do_edit_content'); ?>">
					<input type="hidden" name="input-action" value="<?php echo $action; ?>">
					<?php
						foreach ($contact_en_list as $contact_en) {
							$attribute = explode('|', $contact_en['option_value']);
					?>
					<div class="form-group">
						<label class="col-sm-4 control-label" for=""><?php echo $contact_en['option_key']; ?> (EN):</label>
						<div class="col-sm-6">
							<input type="text" name="<?php echo $contact_en['option_type'].'-'.$contact_en['option_key']; ?>" id="" placeholder="" class="form-control" value="<?php echo $attribute[1]; ?>">
						</div>
					</div>
					<?php } ?>
					<?php
						foreach ($contact_th_list as $contact_th) {
							$attribute = explode('|', $contact_th['option_value']);
					?>
					<div class="form-group">
						<label class="col-sm-4 control-label" for=""><?php echo $contact_th['option_key']; ?> (TH):</label>
						<div class="col-sm-6">
							<input type="text" name="<?php echo $contact_th['option_type'].'-'.$contact_th['option_key']; ?>" id="" placeholder="" class="form-control" value="<?php echo $attribute[1]; ?>">
						</div>
					</div>
					<?php } ?>
					<div class="form-group">
						<div class="col-sm-offset-4 col-sm-8">
							<button class="btn btn-primary" type="submit">Submit</button>
						</div>
					</div>
				</form>
			</div>
			<div aria-labelledby="other-tab" id="other" class="tab-pane fade" role="tabpanel">
				<br>
				<p class="text-right">
					<a class="btn btn-default btn-edit">
						<span class="glyphicon glyphicon-edit"></span>&nbsp;Edit
					</a>
				</p>
				<?php
					foreach ($home_content_list as $home_content) {
						$attribute = explode('|', $home_content['option_value']);
				?>
				<form action="<?php echo site_url('backend/setting/do_edit_file'); ?>" class="form-horizontal" enctype="multipart/form-data" method="post" role="form">
					<input type="hidden" name="input-action" value="<?php echo $action; ?>">
					<div class="form-group">
						<label class="col-sm-4 control-label" for=""><?php echo $attribute[2]; ?> Cover:</label>
						<div class="col-sm-6">
							<img src="<?php echo base_url('assets/images/'.$attribute[0]); ?>">
							<input type="hidden" name="option_id" value="<?php echo $home_content['row_id']; ?>">
							<input type="hidden" name="option_key" value="<?php echo $home_content['option_key']; ?>">
							<input type="file" name="userfile[]">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-4 col-sm-8">
							<button class="btn btn-primary" type="submit">Submit</button>
						</div>
					</div>
				</form>
				<?php } ?>
				<form action="<?php echo site_url('backend/setting/do_edit_file'); ?>" class="form-horizontal" enctype="multipart/form-data" method="post" role="form">
					<input type="hidden" name="input-action" value="<?php echo $action; ?>">
					<input type="hidden" name="action-link" value="<?php echo site_url('backend/setting/do_delete_file'); ?>">
					<div class="form-group">
						<label class="col-sm-4 control-label" for="">HomeCare Download List : </label>
						<div class="col-sm-6">
							<ul>
							<?php foreach ($hc_download_list as $hc_download) { ?>
								<li>
									<a href="<?php echo base_url('assets/download/'.$hc_download['option_value']); ?>" target="_blank">
										<?php echo $hc_download['option_value']; ?>
									</a>
									[ <a class="do-delete-option" data-option-id="<?php echo $hc_download['row_id']; ?>" href="javascript: void(0);">Delete</a> ]
								</li>
							<?php } ?>
							</ul>
							<input type="hidden" name="option_key" value="HomeCare">
							<input type="file" multiple="multiple" name="userfile[]">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-4 col-sm-8">
							<button class="btn btn-primary" type="submit">Submit</button>
						</div>
					</div>
				</form>
				<form action="<?php echo site_url('backend/setting/do_edit_file'); ?>" class="form-horizontal" enctype="multipart/form-data" method="post" role="form">
					<input type="hidden" name="input-action" value="<?php echo $action; ?>">
					<input type="hidden" name="action-link" value="<?php echo site_url('backend/setting/do_delete_file'); ?>">
					<div class="form-group">
						<label class="col-sm-4 control-label" for="">Professional Zone Download List : </label>
						<div class="col-sm-6">
							<ul>
							<?php foreach ($pz_download_list as $pz_download) { ?>
								<li>
									<a href="<?php echo base_url('assets/download/'.$pz_download['option_value']); ?>" target="_blank">
										<?php echo $pz_download['option_value']; ?>
									</a>
									[ <a class="do-delete-option" data-option-id="<?php echo $pz_download['row_id']; ?>" href="javascript: void(0);">Delete</a> ]
								</li>
							<?php } ?>
							</ul>
							<input type="hidden" name="option_key" value="professional-zone">
							<input type="file" multiple="multiple" name="userfile[]">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-4 col-sm-8">
							<button class="btn btn-primary" type="submit">Submit</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>