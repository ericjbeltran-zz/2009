<?php get_header(); ?>
<?php include (TEMPLATEPATH . '/slide.php'); ?>
<div id="content">

<?php include (TEMPLATEPATH . '/glide.php'); ?>

<?php include (TEMPLATEPATH . '/minipost.php'); ?>

<div class="clear"></div>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<div class="post" id="post-<?php the_ID(); ?>">
<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
<div class="date"><?php the_time('M n'); ?> >> <?php the_category(', '); ?></div>	

<div class="cover">
<div class="entry">
<?php $screen = get_post_meta($post->ID,'screen', true); ?>
<img src="<?php echo ($screen); ?>" width="120" height="80" alt=""  />
			<?php the_excerpt(); ?> 
			<div class="clear"></div>

</div>

</div>

</div>
		<?php endwhile; ?>
	
		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div> 
		</div>

	<?php else : ?>

		<div class="post">
			<h1 class="title">Not Found</h1>
			<p>You are looking for something that isn't here.</p>
		</div>

	<?php endif; ?>	

</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>

