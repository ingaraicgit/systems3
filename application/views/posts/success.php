<html>
<head>
<title>Upload Post</title>
</head>
<body>

<h3>Your post was successfully uploaded!</h3>

<ul>
<?php foreach ($upload_data as $item => $value):?>
<li><?php echo $item;?>: <?php echo $value;?></li>
<?php endforeach; ?>
</ul>

<p><?php echo anchor('Posts/create', 'Upload Another File!'); ?></p>

</body>
</html>