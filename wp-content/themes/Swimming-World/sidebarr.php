<?php
/*
Template Name: Right Sidebar
*/
?>

	<div class="sidebarr">

<ul>

<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(2) ) : else : ?>



	<?php if (function_exists('wp_theme_switcher')) { ?>
	<li><h2><?php _e('Themes'); ?></h2>
		<?php wp_theme_switcher(''); ?>
	</li>
	<?php } ?>

	<?php get_links_list(); ?>



	<li><h2><?php _e('Meta'); ?></h2>
		<ul>
			<?php wp_register(); ?>
			<li><?php wp_loginout(); ?></li>
			<li><a href="<?php bloginfo('rss2_url'); ?>" title="<?php _e('Syndicate this site using RSS'); ?>" class="feed"><?php _e('Entries <abbr title="Really Simple Syndication">RSS</abbr>'); ?></a></li>
			<li><a href="<?php bloginfo('comments_rss2_url'); ?>" title="<?php _e('Syndicate comments using RSS'); ?>"><?php _e('Comments <abbr title="Really Simple Syndication">RSS</abbr>'); ?></a></li>
			<li><a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Transitional"><?php _e('Valid'); ?> <abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a></li>
			<li><a href="http://gmpg.org/xfn/"><abbr title="XHTML Friends Network">XFN</abbr></a></li>
			<?php wp_meta(); ?>
		</ul>
	</li>

<?php endif; ?>

</ul>

	</div>
