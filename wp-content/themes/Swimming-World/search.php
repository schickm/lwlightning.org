<?php get_header(); ?>

	<div class="maincol">

<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>

<div class="post" id="post-<?php the_ID(); ?>">
	<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
	<div class="entry">
<?php the_excerpt(); ?>

<!-- 
<?php trackback_rdf(); ?>
 -->

	</div>
	<div class="postmeta"><?php _e('Category&#58;'); ?> <?php the_category(', ') ?> | <?php _e('on'); ?> <?php the_time('m.d.y') ?> | <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?> <?php edit_post_link('Edit','',''); ?></div>
</div>

<?php endwhile; ?>


<?php if (is_single()) : ?>
	<div class="browse"><?php previous_post_link('&laquo; %link') ?> <?php next_post_link(' %link &raquo;') ?></div>
<?php else : ?>
	<div class="browse"><?php posts_nav_link() ?></div>
<?php endif; ?>


<?php else : ?>

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