<h2>
	<?php echo $post['title']; ?>
</h2>

<div class="row">
	<div class="col-md-10">
		<small class="post-date">Posted on: <?php echo $post['created_at']; ?> </small><br>
	</div>

	<div class="col-md-1">
		<a class="btn btn-default"  href="edit/<?php echo $post['slug']; ?>">Edit</a>
	</div>

	<div class="col-md-1">
		<?php echo form_open('/posts/delete/'.$post['id']); ?>
		<input type="submit" value="Delete" class="btn btn-danger"> 
	</div>
</div>

<div class="row">

	<div class="col-md-3">
		<img class="post-thumb"  src="<?php echo site_url(); ?>./images/<?php echo $post['post_image']; ?>"> 
	</div>



	<div class="col-md-9">
		<div class="post-body">

			<div class="row">
				<div class="col-md-2">
					<strong>Description:</strong>
				</div>
				<div class="col-md-7">
				 <?php echo $post['body']; ?>
				</div>
			</div>

			<div class="row">
				<div class="col-md-2">
					<strong>Price:</strong>
				</div>
				<div class="col-md-10">
					<?php echo $post['price']; ?> €
				</div>
			</div>

			
		
		

		</div>
	</div>

</div>

</form>




