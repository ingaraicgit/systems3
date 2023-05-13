<!-- users -->

<br>
<?php echo form_open('users/login'); ?>
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<h1 class="text-center"><?php echo $title; ?></h1>
			<br>
			<div class="form-group">
				<input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
			</div>
			<div class="form-group">
				<input type="password" name="password" class="form-control" placeholder="Password" required autofocus>
			</div>
			<br>
			<br>
			<button type="submit" class="btn btn-success btn-block" style="margin-bottom: 5px;">Login</button>
			<p><a class="btn btn-default btn-block" href="<?php echo site_url('/'); ?>">Cancel</a></p>
		</div>
	</div>
<?php echo form_close(); ?>