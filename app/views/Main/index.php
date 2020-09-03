<li><?php echo $name; ?></li>
<li><?php echo $age; ?></li>
<ol>
	<?php foreach ($posts as $value) {
		echo '<li>'.$value['title'].'</li>';
	} ?>
</ol>