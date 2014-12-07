<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Products</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo site_url('backend/dashboard');?>"><span class="glyphicon glyphicon-dashboard"></span>&nbsp;Dashboard</a></li>
			<li class="active"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;Products</li>
		</ol>
		<?php if ($action !== 'add') { ?>
		<p class="text-right">
			<a id="btn-edit" class="btn btn-default">
				<span class="glyphicon glyphicon-edit"></span>&nbsp;Edit Product
			</a>
		</p>
		<?php } ?>
		<form accept-charset="utf-8" action="<?php echo $action_link; ?>" class="form-horizontal" enctype="multipart/form-data" method="post" role="form">
			<input type="hidden" name="input-action" value="<?php echo $action; ?>">
			<input type="hidden" name="input-row-id" value="<?php echo (isset($product['row_id']))? $product['row_id'] : NULL;?>">
			<div class="form-group">
				<label class="col-sm-4 control-label" for="input-content-language">Product Class :</label>
				<div class="col-sm-6">
					<label class="radio-inline">
						<input type="radio" name="input-product-class" value="home-care" <?php echo (isset($product['product_class_name_en']) AND ($product['product_class_name_en'] === 'HomeCare'))? 'checked': NULL;?>> HomeCare
					</label>
					<label class="radio-inline">
						<input type="radio" name="input-product-class" value="professional-zone" <?php echo (isset($product['product_class_name_en']) AND ($product['product_class_name_en'] === 'Professional Zone'))? 'checked': NULL;?>> Professional Zone
					</label>
				</div>
			</div>
			<div class="form-group">
				<label id="label-product-type" class="col-sm-4 control-label" for="">Product Type : </label>
				<div class="col-sm-6">
					<?php foreach ($product_type_list as $key => $value) { /* BEGIN LOOP { Select }  */ ?>
					<select class="form-control" name="input-product-type" id="<?php echo $key; ?>">
						<?php foreach ($value as $product_type) { /* BEGIN LOOP { Option }  */ ?>
						<option value="<?php echo $product_type['product_type_id']; ?>"><?php echo $product_type['product_type_name_en']; ?></option>
						<?php } /* END LOOP { Option } */ ?>
					</select>
					<?php } /* END LOOP { Select } */ ?>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-4 control-label" for="input-product-code">Product Code : </label>
				<div class="col-sm-6">
					<input type="text" name="input-product-code" id="input-product-code"  placeholder="Product Code" class="form-control" value="<?php echo (isset($product['product_code']))? $product['product_code'] : NULL;?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-4 control-label" for="input-product-name-en" >Product Name (EN) : </label>
				<div class="col-sm-6">
					<input type="text" name="input-product-name-en" id="input-product-name-en"  placeholder="Product Name (EN)" class="form-control" value="<?php echo (isset($product['product_name_en']))? $product['product_name_en'] : NULL;?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-4 control-label" for="input-product-name-th">Product Name (TH) : </label>
				<div class="col-sm-6">
					<input type="text" name="input-product-name-th" id="input-product-name-th"  placeholder="Product Name (TH)" class="form-control" value="<?php echo (isset($product['product_name_th']))? $product['product_name_th'] : NULL;?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-4 control-label" for="input-product-detail-en">Product Detail (EN) : </label>
				<div class="col-sm-6">
					<textarea class="form-control" rows="8" name="input-product-detail-en" id="input-product-detail-en"><?php echo (isset($product['product_detail_en']))? $product['product_detail_en'] : NULL;?></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-4 control-label" for="input-product-detail-th">Product Detail (TH) : </label>
				<div class="col-sm-6">
					<textarea class="form-control" rows="8" name="input-product-detail-th" id="input-product-detail-th"><?php echo (isset($product['product_detail_th']))? $product['product_detail_th'] : NULL;?></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-4 control-label" for="input-benefit-en">Benefit (EN) : </label>
				<div class="col-sm-6">
					<textarea class="form-control" rows="8" name="input-benefit-en" id="input-benefit-en"><?php echo (isset($product['benefit_en']))? $product['benefit_en'] : NULL;?></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-4 control-label" for="input-benefit-th">Benefit (TH) : </label>
				<div class="col-sm-6">
					<textarea class="form-control" rows="8" name="input-benefit-th" id="input-benefit-th"><?php echo (isset($product['benefit_th']))? $product['benefit_th'] : NULL;?></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-4 control-label" for="input-usage-en">Usage (EN) : </label>
				<div class="col-sm-6">
					<textarea class="form-control" rows="8" name="input-usage-en" id="input-usage-en"><?php echo (isset($product['usage_en']))? $product['usage_en'] : NULL;?></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-4 control-label" for="input-usage-th">Usage (TH) : </label>
				<div class="col-sm-6">
					<textarea class="form-control" rows="8" name="input-usage-th" id="input-usage-th"><?php echo (isset($product['usage_th']))? $product['usage_th'] : NULL;?></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-4 control-label" for="input-key-ingredient-en">Key Ingredient (EN) : </label>
				<div class="col-sm-6">
					<textarea class="form-control" rows="8" name="input-key-ingredient-en" id="input-key-ingredient-en"><?php echo (isset($product['key_ingredient_en']))? $product['key_ingredient_en'] : NULL;?></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-4 control-label" for="input-key-ingredient-th">Key Ingredient (TH) : </label>
				<div class="col-sm-6">
					<textarea class="form-control" rows="8" name="input-key-ingredient-th" id="input-key-ingredient-th"><?php echo (isset($product['key_ingredient_th']))? $product['key_ingredient_th'] : NULL;?></textarea>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-sm-4 control-label">Product Image : </label>
				<div class="col-sm-6">
					<?php if ($action === 'add') { ?>
					<input type="file" multiple="" name="userfile[]">
					<?php } else { ?>
					<input type="button"
						class="btn btn-default"
						id="get-product-image-list"
						value="More Detail"
						data-toggle="modal"
						data-target="#product-image-modal">
					<?php } ?>
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
<div class="modal fade" id="product-image-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<?php $product_id = (isset($product['row_id']))? $product['row_id'] : NULL;?>
			<form enctype="multipart/form-data" action="<?php echo site_url('backend/products/manage_image/'.$product_id); ?>" accept-charset="utf-8" method="post" role="form">
				<div class="modal-header">
					<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
					<h4 id="myModalLabel" class="modal-title">Product Image</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<input type="file" multiple="" name="userfile[]">
						<table class="table" id="table-product-image">
							<thead>
								<tr>
									<th>Product Image</th>
									<th>Delete</th>
								</tr>
							</thead>
							<tbody>
								<?php
									if (isset($product['product_image'])) {
										foreach (explode('|', $product['product_image']) as $pro_img) {
								?>
								<tr>
									<td><img alt="" src="<?php echo base_url('assets/images/products/'.$pro_img); ?>" style="width: 200px;" class="img-thumbnail"></td>
									<td>
										<a class="btn btn-default btn-delete-product-image" href="<?php echo site_url('backend/products/ajax_delete_image/'.$product_id.'/'.$pro_img); ?>">
											<span class="glyphicon glyphicon-minus"></span>&nbsp;Delete
										</a>
									</td>
								</tr>
								<?php } /* END FOREACH */ ?>
								<?php } /* END IF */ ?>
							</tbody>
						</table>
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