<h2><?= $title; ?></h2>

<?php echo validation_errors(); ?>


<?php echo form_open_multipart('posts/create'); ?>

  <div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control" name="title" placeholder="Add Title">
  </div>
  
  <div class="form-group">
    <label>Price</label>
    <br>
    <input type="number" name="price" min="0.01" step="0.01">€
  </div>

  <div class="form-group">
    <label>Description</label>
    <textarea id="editor1" class="form-control" name="body" placeholder="Add Body">
    </textarea>
  </div> 

  <div class="form-group">
    <label>Category</label>
    <select name="category_id" class="form-control">
      <?php foreach($categories as $category): ?>
        <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
      <?php endforeach; ?>
    </select>
  </div>
 
 <div class="form-group">
    <label>Product Image</label>
    <input type="file" name="userfile" size="20">
  </div>

 <div style="margin-bottom: 30px;">
    <p><a class="btn btn-default" href="<?php echo site_url('/posts'); ?>">Cancel</a></p>
    <button type="submit" class="btn btn-success" >Submit</button>  
  </div>

</form>