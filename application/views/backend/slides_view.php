<div class="row">
	<div class="col-lg-12">
		<input type="hidden" id="site_url" value="<?php echo site_url(); ?>">
		<h1 class="page-header">Slides</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo site_url('backend/dashboard');?>"><span class="glyphicon glyphicon-dashboard"></span>&nbsp;Dashboard</a></li>
			<li class="active"><span class="glyphicon glyphicon-picture"></span>&nbsp;Slider</li>
		</ol>
		<p class="text-right">
			<button class="btn btn-success" data-toggle="modal" data-target="#add-photo-modal"><span class="glyphicon glyphicon-plus"></span>&nbsp;Add Photo</button>
		</p>
		<?php
			if (isset($result_sets['succeed']) AND $result_sets['succeed'] > 0) {
				echo '<div class="alert alert-success" role="alert"><strong>Succeed:</strong> '.$result_sets['succeed'].' row(s) affected</div>';
			} 
			if (isset($result_sets['failed'])) {
				echo '<div class="alert alert-danger" role="alert"><strong>Failed:</strong> '.$result_sets['failed'].'</div>';
			}
		?>
	</div>
</div>
<div class="row">
	<?php foreach($slides as $slide) { ?>
	<div class="col-lg-3">
		<a class="thumbnail get-photo-modal" href="#photo-modal" data-photo-name="<?php echo $slide['option_key']; ?>" data-action-link="<?php echo $slide['option_value']; ?>" data-toggle="modal">
			<img src="<?php echo base_url('assets/images/slides/'.$slide['option_key']); ?>">
        </a>
	</div>
	<?php } ?>
</div>
<div class="modal fade" id="add-photo-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form enctype="multipart/form-data" action="<?php echo site_url('backend/slides/do_insert_photo'); ?>" accept-charset="utf-8" method="post" role="form">
				<div class="modal-header">
					<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
					<h4 id="myModalLabel" class="modal-title">Add Photo</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<input type="file" multiple="" name="userfile[]">
					</div>
				</div>
				<div class="modal-footer">
					<button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
					<input type="submit" value="Save Changes" name="input-add-photos" class="btn btn-primary">
				</div>
			</form>
		</div>
	</div>
</div>
<div class="modal fade" id="photo-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title" id="myModalLabel">Photo</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-xs-7"></div>
					<div class="col-xs-5">
						<div class="text-right">
							<div class="btn-group btn-group-sm">
								<a class="btn btn-default" id="do-edit-photo" href="javascript: void(0);">Edit</a>
								<a class="btn btn-default" id="do-delete-photo" href="">Delete This Photo</a>
							</div>
						</div>
						<form class="form-horizontal" role="form" method="post" accept-charset="utf-8" action="" id="edit-photo-form">
							<label for="input-photo-description">Action Link:</label>
							<input type="text" class="form-control" name="input-action-link">
							<br>
							<input class="btn btn-default" name="cancel-edit-photo" type="button" value="Cancel">
							<input class="btn btn-primary" name="save-changes-edit-photo" type="submit" value="Save Changes">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>