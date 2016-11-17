<?php get_header(); ?>

<div id="content">
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<div class="post" id="post-<?php the_ID(); ?>">
<div class="title">

<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
<div class="date"><?php the_time('M n'); ?></span></div>	
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

</div>
</div>
<div class="singlemeta">
					
						
						<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Both Comments and Pings are open ?>
							You can <a href="#respond">leave a response</a>, or <a href="<?php trackback_url(); ?>" rel="trackback">trackback</a> from your own site.

						<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Only Pings are Open ?>
							Responses are currently closed, but you can <a href="<?php trackback_url(); ?> " rel="trackback">trackback</a> from your own site.

						<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Comments are open, Pings are not ?>
							You can skip to the end and leave a response. Pinging is currently not allowed.

						<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Neither Comments, nor Pings are open ?>
							Both comments and pings are currently closed.

						<?php } edit_post_link('Edit this entry','','.'); ?>
</div>


<?php comments_template(); ?>
	<?php endwhile; else: ?>

		<h1 class="title">Not Found</h1>
		<p>I'm Sorry,  You are looking for something that is not here. </p>

<?php endif; ?>

</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>