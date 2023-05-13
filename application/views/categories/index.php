<h2><?= $title ?></h2>

<ul>
<br>	
<?php foreach ($categories as $category) :?>
	<li class="list-group-item" style="margin-bottom: 5px; border: none; font-size: 18px;">
		<a href="<?php echo site_url('/categories/posts/'.$category['id']); ?>"><?php echo $category['name']; ?></a>
	</li>
	
<?php endforeach; ?>
</ul>


