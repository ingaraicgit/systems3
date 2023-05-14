<h2><?= $title ?></h2>

<ul class="list-group">
	<br>	
	<?php foreach ($categories as $category) :?>
		<li class="list-group-item" style="color: black; border: none; font-size: 24px;">
			<a href="<?php echo site_url('/categories/posts/'.$category['id']); ?>"><?php echo $category['name']; ?></a>
		</li>
	<?php endforeach; ?>
</ul>


