<?php 
	$img = get_option('tri_img'); 
	$about = get_option('tri_about'); 
	?>			
<div class="about">

<img src="<?php echo ($img); ?>" class="avatar" alt="Eric Beltran : Robby Benson" />
<span style="text">
<?php echo ($about); ?>
</span>
</div>