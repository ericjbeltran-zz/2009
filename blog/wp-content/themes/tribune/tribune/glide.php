<script type="text/javascript">

featuredcontentglider.init({
	gliderid: "glidercontent",
	contentclass: "glidecontent",
	togglerid: "togglebox",
	remotecontent: "", 
	selected: 0,
	persiststate: true,
	speed: 300,
	direction: "leftright", 
	autorotate: false, 
	autorotateconfig: [10000, 1] //if auto rotate enabled, set [milliseconds_btw_rotations, cycles_before_stopping]
})


</script>

<div id="glidercontent" class="glidecontentwrapper">

<div id="togglebox" class="glidecontenttoggler"> 


<a href="#" class="prev"></a> 

<a href="#" class="next"></a>


</div>

<?php 
	$glidecat = get_option('tri_gldcat'); 
	$glidecount = get_option('tri_gldct'); 
	$my_query = new WP_Query('category_name= '. $glidecat .'&showposts= '. $glidecount . '');
while ($my_query->have_posts()) : $my_query->the_post();$do_not_duplicate = $post->ID;
?>

<div class="glidecontent">

<div class="glidemeta">
<h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
 <?php the_content_rss('', TRUE, '', 40); ?>
</div>



<?php $feature = get_post_meta($post->ID,'feature', true); ?>
<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" > <img src="<?php echo ($feature); ?>" width="650" height="250" alt="<?php the_title(); ?>"/> </a>



</div>
<?php endwhile; ?>


</div>


 <div class="clear"></div>