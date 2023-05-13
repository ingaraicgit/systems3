<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="https://bootswatch.com/3/united/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
	<script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
	<title>Flora</title>
</head>

<body>

	<nav class="navbar navbar-inverse">

			<div style="margin: 10px;" class="row">

				<div class="col-md-4">
					<div class="navbar-header flora">
						<h1 class= "flora" href="<?php echo base_url(); ?>">Flora<span>Community</span></h1>
					</div>
				</div>	

				<div class="col-md-4"></div>

				<div class="col-md-4">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="<?php echo base_url(); ?>admins/login" >Admin Log in</a></li>
						<li><a href="<?php echo base_url(); ?>admins/register" >Register a shop</a></li>
					</ul>
				</div>
			
				
		
			</div>

			<div class="row">

				<div class="col-md-9"></div>

				<div class="col-md-3" style="padding-right: 70px;">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="<?php echo base_url(); ?>users/login" >Log in</a></li>
						<li><a href="<?php echo base_url(); ?>users/register" >Sign up</a></li>
					</ul>
				</div>

			</div>

		<div id="navbar">
			<ul class="nav navbar-nav" style="padding-left: 20px;">
				<li><a href="<?php echo base_url(); ?>">Home</a></li>
				<li><a href="<?php echo base_url(); ?>categories">Shop by Category</a></li>
				<li><a href="<?php echo base_url(); ?>posts">Shop by Product</a></li>
				<!--<li><a href="<?php echo base_url(); ?>about">Community</a></li>-->
			</ul>

			<ul class="nav navbar-nav navbar-right" style="padding-right: 50px;">
				<li><a href="<?php echo base_url(); ?>categories/categories_create" >Create Product Category</a></li>
				<li><a href="<?php echo base_url(); ?>posts/create" >Add Product</a></li>
			</ul>

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
		
