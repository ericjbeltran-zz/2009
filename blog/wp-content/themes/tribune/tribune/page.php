<?php get_header(); ?>

<div id="content">

<?php if (have_posts()) : ?>

<?php while (have_posts()) : the_post(); ?>
<div class="post" id="post-<?php the_ID(); ?>">
<div class="title">

<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
<div class="date"><span class="clock"><?php the_time('M n'); ?></span></div>	
</div>

<div class="cover">
<div class="entry">
					<?php the_content('Read the rest of this entry &raquo;'); ?>
					<div class="clear"></div>
					<?php include (TEMPLATEPATH . '/ad1.php'); ?>
</div>

</div>

<div class="postinfo">
					<div class="category"><?php the_category(', '); ?> </div>
					<div class="com"><?php comments_popup_link('ADD COMMENTS', '1 COMMENT', '% COMMENTS'); ?></div>
</div>



<?php get_sidebar(); ?>
<?php get_footer(); ?>