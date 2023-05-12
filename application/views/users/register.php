<!--user-->


<h2><?= $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('users/register'); ?>
	<br>
	<div class="form-group">
    	<label>Full Name</label>
    	<input type="text" class="form-control" name="full_name" placeholder="John Doe">
  	</div>

  	<div class="form-group">
    	<label>Email</label>
    	<input type="email" class="form-control" name="email" placeholder="email@example.com">
  	</div>


  	<div class="form-group">
    	<label>Username</label>
    	<input type="text" class="form-control" name="username" placeholder="johnd123">
  	</div>
  
	<div class="form-group">
    	<label>Password</label>
    	<input type="password" class="form-control" name="password" placeholder="Password of 5 characters or more">
  	</div>

  	<div class="form-group">
    	<label>Confirm Password</label>
    	<input type="password" class="form-control" name="password2" placeholder="Retype Password">
  	</div>

  	<div class="form-group">
    	<label>Phone number</label>
    	<input type="text" class="form-control" name="phone" placeholder="(00380) (0)12 345 678">
  	</div>

 <div style="margin-bottom: 30px;">
    <button type="submit" class="btn btn-success" >Submit</button>  
  </div>

<? echo form_close(); ?>