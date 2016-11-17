<div class="minipost">
<?php 
	$minicat1 = get_option('tri_mini_category1'); 
	$my_query = new WP_Query('category_name= '. $minicat1 .'&showposts=1');
while ($my_query->have_posts()) : $my_query->the_post();$do_not_duplicate = $post->ID;
?>

<div class="hentry">
<h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
<div class="minicontent">
<div class="categ"><?php the_category(', '); ?> </div> 
<?php $screen = get_post_meta($post->ID,'screen', true); ?>
<img src="<?php echo ($screen); ?>" width="120" height="80" alt=""  />
 <?php the_content_rss('', TRUE, '', 40); ?>
 </div>

</div>
<div class="minimeta"><?php the_time('M n') ?> // <a href="<?php the_permalink() ?>"><em>full story</em></a></div>
<?php endwhile; ?>
</div>


<div class="minipost">
<?php 
	$minicat2 = get_option('tri_mini_category2'); 
	$my_query = new WP_Query('category_name= '. $minicat2 .'&showposts=1');
while ($my_query->have_posts()) : $my_query->the_post();$do_not_duplicate = $post->ID;
?>
<div class="hentry">
<h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
<div class="categ"><?php the_category(', '); ?> </div> 
<div class="minicontent">
<?php $screen = get_post_meta($post->ID,'screen', true); ?>
<img src="<?php echo ($screen); ?>" width="120" height="80" alt=""  />
 <?php the_content_rss('', TRUE, '', 40); ?>
 </div>

</div>
<div class="minimeta"><?php the_time('M n') ?> // <a href="<?php the_permalink() ?>"><em>full story</em></a></div>
<?php endwhile; ?>
</div>



<div class="minipost">
<?php 
	$minicat3 = get_option('tri_mini_category3'); 
	$my_query = new WP_Query('category_name= '. $minicat3 .'&showposts=1');
while ($my_query->have_posts()) : $my_query->the_post();$do_not_duplicate = $post->ID;
?>
<div class="hentry">
<h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
<div class="categ"><?php the_category(', '); ?> </div> 
<div class="minicontent">
<?php $screen = get_post_meta($post->ID,'screen', true); ?>
<img src="<?php echo ($screen); ?>" width="120" height="80" alt=""  />
 <?php the_content_rss('', TRUE, '', 40); ?>
 </div>

</div>
<div class="minimeta"><?php the_time('M n') ?> // <a href="<?php the_permalink() ?>"><em>full story</em></a></div>
<?php endwhile; ?>
</div>





<div class="minipost">
<?php 
	$minicat4 = get_option('tri_mini_category4'); 
	$my_query = new WP_Query('category_name= '. $minicat4 .'&showposts=1');
while ($my_query->have_posts()) : $my_query->the_post();$do_not_duplicate = $post->ID;
?>
<div class="hentry">
<h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
<div class="categ"><?php the_category(', '); ?> </div> 
<div class="minicontent">
<?php $screen = get_post_meta($post->ID,'screen', true); ?>
<img src="<?php echo ($screen); ?>" width="120" height="80" alt=""  />
 <?php the_content_rss('', TRUE, '', 40); ?>
 </div>

</div>
<div class="minimeta"><?php the_time('M n') ?> // <a href="<?php the_permalink() ?>"><em>full story</em></a></div>
<?php endwhile; ?>
</div>
