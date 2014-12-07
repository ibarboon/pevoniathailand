<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Users</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo site_url('backend/dashboard');?>"><span class="glyphicon glyphicon-dashboard"></span>&nbsp;Dashboard</a></li>
			<li class="active"><span class="glyphicon glyphicon-user"></span>&nbsp;Users</li>
		</ol>
		<form role="form" class="form-horizontal" method="post" action="<?php echo site_url('backend/users/do_add'); ?>">
			<div class="form-group">
				<label class="col-sm-3 control-label" for="in-email">Email</label>
				<div class="col-sm-4">
					<input type="email" name="in-email" id="in-email" placeholder="Email" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label" for="in-user-signin">Username</label>
				<div class="col-sm-4">
					<input type="text" name="in-user-signin" id="in-user-signin" placeholder="Username" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label" for="in-password">Password</label>
				<div class="col-sm-4">
					<input type="password" name="in-password" id="in-password"  placeholder="Password" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label" for="in-confirm-password">Confirm Password</label>
				<div class="col-sm-4">
					<input type="password" name="in-confirm-password" id="in-confirm-password"  placeholder="Confirm Password" class="form-control">
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