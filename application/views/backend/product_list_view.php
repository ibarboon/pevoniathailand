<div class="row">
	<div class="col-lg-12">
		<form accept-charset="utf-8" action="<?php echo site_url('backend/products/do_delete'); ?>" class="form-horizontal"  method="post" role="form">
			<h1 class="page-header">Products</h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo site_url('backend/dashboard');?>"><span class="glyphicon glyphicon-dashboard"></span>&nbsp;Dashboard</a></li>
				<li class="active"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;Products</li>
			</ol>
			<p class="text-right">
				<button id="btn-do-delete" class="btn btn-danger" type="submit" style="display: none;">
					<span class="glyphicon glyphicon-minus"></span>&nbsp;Delete Product
				</button>
				<a class="btn btn-success" href="<?php echo site_url('backend/products/add'); ?>">
					<span class="glyphicon glyphicon-plus"></span>&nbsp;Add Product
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
						<th><input type="checkbox" id="checkbox-all"></th>
						<th>Product Code</th>
						<th>Product Name (EN)</th>
						<th>Product Name (TH)</th>
						<th>Created</th>
						<th>Created By</th>
						<th>Last Updated</th>
						<th>Last Updated By</th>
					</tr>
				</thead>
				<tbody>
					<?php if (count($product_list) > 0) { ?>
						<?php foreach ($product_list as $product) { ?>
						<tr>
							<td><input type="checkbox" class="checkbox-for-delete" name="input-row-id[]" value="<?php echo $product['row_id']; ?>"></td>
							<td><a href="<?php echo site_url('backend/products/view/'.$product['product_code']); ?>"><?php echo $product['product_code']; ?></a></td>
							<td><?php echo $product['product_name_en']; ?></td>
							<td><?php echo $product['product_name_th']; ?></td>
							<td><?php echo $product['created']; ?></td>
							<td><?php echo $product['created_by']; ?></td>
							<td><?php echo $product['last_updated']; ?></td>
							<td><?php echo $product['last_updated_by']; ?></td>
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