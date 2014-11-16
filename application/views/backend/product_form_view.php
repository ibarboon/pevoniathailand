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
				<span class="glyphicon glyphicon-edit"></span>&nbsp;Edit Content
			</a>
		</p>
		<?php } ?>
		<form accept-charset="utf-8" action="<?php echo $action_link; ?>" class="form-horizontal" enctype="multipart/form-data" method="post" role="form">
			<input type="hidden" name="input-action" value="<?php echo $action; ?>">
			<input type="hidden" name="input-row-id" value="<?php echo (isset($content['row_id']))? $content['row_id'] : NULL;?>">
			<input type="hidden" name="input-old-product-media" value="<?php echo (isset($content['content_media']))? $content['content_media'] : NULL;?>">
			<div class="form-group">
				<label class="col-sm-4 control-label" for="input-content-language">Product Class :</label>
				<div class="col-sm-6">
					<label class="radio-inline">
						<input type="radio" name="input-product-class" value="home-care"> HomeCare
					</label>
					<label class="radio-inline">
						<input type="radio" name="input-product-class" value="professional-zone"> Professional Zone
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
					<input type="text" name="input-product-code" id="input-product-code"  placeholder="Product Code" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-4 control-label" for="input-product-name-en">Product Name (EN) : </label>
				<div class="col-sm-6">
					<input type="text" name="input-product-name-en" id="input-product-name-en"  placeholder="Product Name (EN)" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-4 control-label" for="input-product-name-th">Product Name (TH) : </label>
				<div class="col-sm-6">
					<input type="text" name="input-product-name-th" id="input-product-name-th"  placeholder="Product Name (TH)" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-4 control-label" for="input-product-detail-en">Product Detail (EN) : </label>
				<div class="col-sm-6">
					<textarea class="form-control" rows="8" name="input-product-detail-en" id="input-product-detail-en"></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-4 control-label" for="input-product-detail-th">Product Detail (TH) : </label>
				<div class="col-sm-6">
					<textarea class="form-control" rows="8" name="input-product-detail-th" id="input-product-detail-th"></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-4 control-label" for="input-benefit-en">Benefit (EN) : </label>
				<div class="col-sm-6">
					<textarea class="form-control" rows="8" name="input-benefit-en" id="input-benefit-en"></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-4 control-label" for="input-benefit-th">Benefit (TH) : </label>
				<div class="col-sm-6">
					<textarea class="form-control" rows="8" name="input-benefit-th" id="input-benefit-th"></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-4 control-label" for="input-usage-en">Usage (EN) : </label>
				<div class="col-sm-6">
					<textarea class="form-control" rows="8" name="input-usage-en" id="input-usage-en"></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-4 control-label" for="input-usage-th">Usage (TH) : </label>
				<div class="col-sm-6">
					<textarea class="form-control" rows="8" name="input-usage-th" id="input-usage-th"></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-4 control-label" for="input-key-ingredient-en">Key Ingredient (EN) : </label>
				<div class="col-sm-6">
					<textarea class="form-control" rows="8" name="input-key-ingredient-en" id="input-key-ingredient-en"></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-4 control-label" for="input-key-ingredient-th">Key Ingredient (TH) : </label>
				<div class="col-sm-6">
					<textarea class="form-control" rows="8" name="input-key-ingredient-th" id="input-key-ingredient-th"></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-4 control-label">Product Image : </label>
				<div class="col-sm-6">
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
				<div class="col-sm-offset-4 col-sm-8">
					<button class="btn btn-primary" type="submit">Submit</button>
				</div>
			</div>
		</form>
	</div>
</div>