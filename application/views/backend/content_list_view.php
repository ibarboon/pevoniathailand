<div class="row">
	<div class="col-lg-12">
		<form accept-charset="utf-8" action="<?php echo site_url('backend/contents/do_delete'); ?>" class="form-horizontal"  method="post" role="form">
			<h1 class="page-header">Contents</h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo site_url('backend/dashboard');?>"><span class="glyphicon glyphicon-dashboard"></span>&nbsp;Dashboard</a></li>
				<li class="active"><span class="glyphicon glyphicon-file"></span>&nbsp;Contents</li>
			</ol>
			<p class="text-right">
				<button id="btn-do-delete" class="btn btn-danger" type="submit" style="display: none;">
					<span class="glyphicon glyphicon-minus"></span>&nbsp;Delete Content
				</button>
				<a class="btn btn-success" href="<?php echo site_url('backend/contents/add'); ?>">
					<span class="glyphicon glyphicon-plus"></span>&nbsp;Add Content
				</a>
			</p>
			<?php
				if (isset($mysql_result)) {
					if ($mysql_result > 0) {
						echo '<div class="alert alert-success" role="alert"><strong>Succeed:</strong> '.$mysql_result.' row(s) affected</div>';
					} else {
						echo '<div class="alert alert-danger" role="alert"><strong>Failed:</strong> '.$mysql_result.'</div>';
					}
				}
			?>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th><input type="checkbox" id="content-control-checkbox"></th>
						<th>Content Type</th>
						<th>Content Name</th>
						<th>Content Language</th>
						<th>Created</th>
						<th>Created By</th>
						<th>Last Updated</th>
						<th>Last Updated By</th>
					</tr>
				</thead>
				<tbody>
					<?php if (count($content_list) > 0) { ?>
						<?php foreach ($content_list as $content) { ?>
						<tr>
							<td><input type="checkbox" class="content-checkbox" name="input-row-id[]" value="<?php echo $content['row_id']; ?>"></td>
							<td><?php echo $content['content_type']; ?></td>
							<td><a href="<?php echo site_url('backend/contents/view/'.$content['row_id']); ?>"><?php echo $content['content_alias_name']; ?></a></td>
							<td><?php echo $content['content_language']; ?></td>
							<td><?php echo $content['created']; ?></td>
							<td><?php echo $content['created_by']; ?></td>
							<td><?php echo $content['last_updated']; ?></td>
							<td><?php echo $content['last_updated_by']; ?></td>
						</tr>			
						<?php } /* end loop */ ?>
					<?php } else { ?>
						<tr>
							<td colspan="6">No Data Found</td>
						</tr>
					<?php } /* end if */ ?>
				</tbody>
			</table>
		</form>
	</div>
</div>