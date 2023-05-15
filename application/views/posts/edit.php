<h2><?= $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('posts/update'); ?>

<input type="hidden" name="id" value="<?php echo $post['id']; ?>">

  <div class="form-group">
    <label>Title</label>
    <input type="text" class="form-control" name="title" placeholder="Add Title" value="<?php echo $post['title'];?>">
  </div>

<div class="form-group">
    <label>Price</label>
    <br>
    <input type="number" name="price" min="0.01" step="0.01"> €
  </div>
  
  <div class="form-group">
    <label>Body</label>
    <textarea id="editor1" class="form-control" name="body" placeholder="Add Body"><?php echo $post['body']; ?></textarea>
  </div> 

 <div class="form-group">
    <label>Category</label>
    <select name="category_id" class="form-control">
      <?php foreach($categories as $category): ?>
        <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
      <?php endforeach; ?>
    </select>
  </div>

  <div style="margin-bottom: 30px;">
    <p><a class="btn btn-default" href="<?php echo site_url('/posts/'.$post['slug']); ?>">Cancel</a></p>
    <button type="submit" class="btn btn-success" >Submit</button>  
  </div>

</form>