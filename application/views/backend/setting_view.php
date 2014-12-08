<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Setting</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo site_url('backend/dashboard');?>"><span class="glyphicon glyphicon-dashboard"></span>&nbsp;Dashboard</a></li>
			<li class="active"><span class="glyphicon glyphicon-cog"></span>&nbsp;Setting</li>
		</ol>
		<pre>
			<?php print_r($social_network_list); ?>
		</pre>
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
				<form role="form" class="form-horizontal" method="post" action="">
					<div class="form-group">
						<label class="col-sm-4 control-label" for="input-default-language">default_language :</label>
						<div class="col-sm-6">
							<label class="radio-inline">
								<input type="radio" name="input-default-language" value="en" <?php echo ($default_language_list[0]['option_value'] === 'en')? 'checked': NULL;?> disabled> English
							</label>
							<label class="radio-inline">
								<input type="radio" name="input-default-language" value="th" <?php echo ($default_language_list[0]['option_value'] === 'th')? 'checked': NULL;?> disabled> Thailand
							</label>
						</div>
					</div>
					<?php foreach ($html_meta_list as $html_meta) { ?>
					<div class="form-group">
						<label class="col-sm-4 control-label" for=""><?php echo $html_meta['option_key']; ?> :</label>
						<div class="col-sm-6">
							<input type="text" name="" id="" placeholder="" class="form-control" value="<?php echo $html_meta['option_value']; ?>" disabled>
						</div>
					</div>
					<?php } ?>
					<?php
						foreach ($social_network_list as $social_network) {
							$attribute = explode('|', $social_network['option_value']);
					?>
					<div class="form-group">
						<label class="col-sm-4 control-label" for=""><?php echo $social_network['option_key']; ?> :</label>
						<div class="col-sm-6">
							<input type="text" name="" id="" placeholder="" class="form-control" value="<?php echo $attribute[1]; ?>" disabled>
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
				<p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel. Art party scenester stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo park.</p>
			</div>
			<div aria-labelledby="other-tab" id="other" class="tab-pane fade" role="tabpanel">
				<p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel. Art party scenester stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo park.</p>
			</div>
		</div>
	</div>
</div>