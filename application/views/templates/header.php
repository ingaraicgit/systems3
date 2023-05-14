<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="https://bootswatch.com/3/united/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
	<script type="text/javascript"src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
	<script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
	<title>Flora</title>
</head>

<body>

	<div class="row">
		<div class="col-md-4">
			<div class="container">
				<div class="navbar-header" >
					<h1 class= "flora" href="<?php echo base_url(); ?>" style="font: Garamond; color: #772953; letter-spacing: 3px; font-size: 48px;">FLORA <span style="font-size: 24px; letter-spacing: 0.5px;">COMMUNITY</span></h1>
				</div>			
			</div>
		</div>	
		<div class="col-md-8"> </div>
	</div>


	<nav class="navbar navbar-inverse">
 		
 			<!--user logged in-->
					<ul class="nav navbar-nav navbar-right" style="padding-right: 50px;">
						<?php if($this->session->userdata('logged_in')): ?>
							<?php if(($this->session->userdata('account')=="user")):?>
								<li><a href="<?php echo base_url(); ?>cart/index" >My Cart</a></li>
								<li><a href="<?php echo base_url(); ?>users/logout" >Log out</a></li>
							<?php endif;?>
							<?php if(($this->session->userdata('account')=="admin")):?>
								<li><a href="<?php echo base_url(); ?>admins/logout" >Log out</a></li>	
							<?php endif;?>
						<?php endif;?>
					</ul>				
	
				<!--user logged out-->
					<ul class="nav navbar-nav navbar-right" >
						<?php if(!$this->session->userdata('logged_in')): ?>
							<li><a href="<?php echo base_url(); ?>users/login" >Log in</a></li>
							<li><a href="<?php echo base_url(); ?>users/register" style="border-right: 1px solid white;" >Sign up</a></li>
						
							<li><a href="<?php echo base_url(); ?>admins/login" >Admin Log in</a></li>
							<li><a href="<?php echo base_url(); ?>admins/register" >Register a shop</a></li>
						<?php endif;?>
					</ul>
			
		<div id="navbar">
			<ul class="nav navbar-nav" style="padding-left: 20px;">
				<li><a href="<?php echo base_url(); ?>">Home</a></li>
				<li><a href="<?php echo base_url(); ?>categories">Shop by Category</a></li>
				<li><a href="<?php echo base_url(); ?>posts">Shop by Product</a></li>
			</ul>

			<?php if($this->session->userdata('logged_in')): ?>
      	<?php if(($this->session->userdata('account')=="admin")):?>
					<ul class="nav navbar-nav navbar-right" style="padding-right: 50px;">
						<li><a href="<?php echo base_url(); ?>categories/categories_create" >Create Product Category</a></li>
						<li><a href="<?php echo base_url(); ?>posts/create" style="border-right: 1px solid white;" >Add Product</a></li>
					</ul>
				<?php endif;?>
			<?php endif;?>

		</div>
	</nav>

	 <div class="container">
      <!-- Flash messages -->
      <?php if($this->session->flashdata('user_account')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_account').'</p>'; ?>
      <?php endif; ?>

       <?php if($this->session->flashdata('admin_account')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('admin_account').'</p>'; ?>
      <?php endif; ?>

       <?php if($this->session->flashdata('product_added')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('product_added').'</p>'; ?>
      <?php endif; ?>

       <?php if($this->session->flashdata('category_created')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('category_created').'</p>'; ?>
      <?php endif; ?>

			<?php if($this->session->flashdata('login_fail')): ?>
        <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_fail').'</p>'; ?>
      <?php endif; ?>

      	<?php if($this->session->flashdata('logout')): ?>
        <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('logout').'</p>'; ?>
      <?php endif; ?>

      	<?php if($this->session->flashdata('order_success')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('order_success').'</p>'; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('order_fail')): ?>
        <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('order_fail').'</p>'; ?>
      <?php endif; ?>
		
		
		
