<div id="scroller_container" >
<div id="scroller">
<?php 

	$my_query = new WP_Query('orderby=rand &showpost=2');
while ($my_query->have_posts()) : $my_query->the_post();$do_not_duplicate = $post->ID;

?>



<div class="panel">
<?php $screen = get_post_meta($post->ID,'screen', true); ?>
<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" > <img src="<?php echo ($screen); ?>" width="60" height="40" alt=""  /></a>
<div class="fmeta">  <?php the_content_rss('', TRUE, '', 15); ?> </div>
</div>

<?php endwhile; ?>


</div>
</div>

