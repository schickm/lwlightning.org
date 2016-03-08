<?php get_header(); ?>

	<div class="maincol">

<div class="post">
	<h2><?php _e('Not Found'); ?></h2>
	<div class="entry">
<p><?php _e('The page you are looking is not here.'); ?></p>
<p><a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('name'); ?> <?php _e('home'); ?>"><?php _e('Return to the home page'); ?></a>.</p>
	</div>
</div>

	</div>

<?php get_footer(); ?>