<?php get_header(); ?>

	<div class="maincol">

<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>

<div class="post" id="post-<?php the_ID(); ?>">
	<h2><?php the_title(); ?></h2>
	<div class="entry">
<?php the_content(); ?>
<?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>

<?php edit_post_link('Edit this entry.','<p>','</p>'); ?>

<!-- 
<?php trackback_rdf(); ?>
 -->

	</div>
	<div class="comments-template">
<?php comments_template(); ?>
	</div>
</div>

<?php endwhile; else : ?>

<div class="post">
	<h2><?php _e('Not Found'); ?></h2>
	<div class="entry">
<p><?php _e('The page you are looking is not here.'); ?></p>
<p><a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('name'); ?> <?php _e('home'); ?>"><?php _e('Return to the home page'); ?></a>.</p>
	</div>
</div>

<?php endif; ?>

	</div>

<?php get_footer(); ?>