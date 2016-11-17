<?php get_header(); ?>
<?php include (TEMPLATEPATH . '/slide.php'); ?>
<div id="content">
<?php if (have_posts()) : ?>
		<h2 class="pagetitle">Search Results</h2>
<?php while (have_posts()) : the_post(); ?>
<div class="post" id="post-<?php the_ID(); ?>">
<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
<div class="date"><span class="author">Posted by <?php the_author(); ?></span> <span class="clock"> On <?php the_time('F - j - Y'); ?></span> <span class="com"><?php comments_popup_link('ADD COMMENTS', '1 COMMENT', '% COMMENTS'); ?></span></div>	


<div class="cover">
<div class="entry">
					<?php the_content('Read the rest of this entry &raquo;'); ?>
				<div class="clear"></div>
</div>

</div>

<div class="postinfo">
					<div class="category"><?php the_category(', '); ?> </div>
					
</div>

</div>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
		</div>

	<?php else : ?>

		<h1 class="title">Not Found</h1>
		<p>Sorry, no post matched your criteria. Try a different search?</p>

	<?php endif; ?>

</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>