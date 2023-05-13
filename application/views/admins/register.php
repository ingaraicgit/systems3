<!--admin-->


<?php echo validation_errors(); ?>

<?php echo form_open('admins/register'); ?>

 <div class="row">
   <br>
      <div class="col-md-4 col-md-offset-4">
         <h1 class="text-center"><?= $title; ?></h1>
         <br>
	
      	<div class="form-group">
          	<label>Store Name</label>
          	<input type="text" class="form-control" name="store_name" placeholder="e.g. Flower Shop">
        	</div>

        	<div class="form-group">
          	<label>Email</label>
          	<input type="email" class="form-control" name="email" placeholder="email@example.com">
        	</div>


        	<div class="form-group">
          	<label>Username</label>
          	<input type="text" class="form-control" name="username" placeholder="e.g. shop123">
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
          	<input type="text" class="form-control" name="phone" placeholder="e.g. (00380) (0)12 345 678">
        	</div>

       <div style="margin-bottom: 30px;">
          <button type="submit" class="btn btn-success btn-block" style="margin-bottom: 5px;" >Submit</button>  
          <p><a class="btn btn-default btn-block" href="<?php echo site_url('/'); ?>">Cancel</a></p>
        </div>
      </div>
   </div>

<? echo form_close(); ?>