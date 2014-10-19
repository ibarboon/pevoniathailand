<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Users</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo site_url('backend/dashboard');?>"><span class="glyphicon glyphicon-dashboard"></span>&nbsp;Dashboard</a></li>
			<li class="active"><span class="glyphicon glyphicon-user"></span>&nbsp;Users</li>
		</ol>
		<p class="text-right">
			<button class="btn btn-success" data-toggle="modal" data-target="#add-photo-modal"><span class="glyphicon glyphicon-plus"></span>&nbsp;Add User</button>
		</p>
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Username</th>
					<th>Password</th>
					<th>Email</th>
					<th>Last Signin</th>
					<th>Last Password Changed</th>
				</tr>
			</thead>
			<tbody>
				<?php if (count($user_list) > 0) { ?>
					<?php foreach ($user_list as $user) { ?>
					<tr>
						<td><?php echo $user['user_id']; ?></td>
						<td><?php echo $user['user_signin']; ?></td>
						<td><?php echo $user['user_password']; ?></td>
						<td><?php echo $user['user_email']; ?></td>
						<td><?php echo ($user['user_last_signin'])? $user['user_last_signin']: '-'; ?></td>
						<td><?php echo ($user['user_password_changed'])? $user['user_password_changed']: '-'; ?></td>
					</tr>			
					<?php } /* end loop */ ?>
				<?php } else { ?>
					<tr>
						<td colspan="6">No Data Found</td>
					</tr>
				<?php } /* end if */ ?>
			</tbody>
		</table>
	</div>
</div>