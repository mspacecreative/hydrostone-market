<?php
/*
Template Name: Right Sidebar
*/
?>
<?php get_header(); ?>
	<div class="header-collage">
		<img src="<?php bloginfo('template_url'); ?>/images/header-collage.jpg" class="full-width" />
		<img src="<?php bloginfo('template_url'); ?>/images/header-collage-sm.jpg" class="full-width mobile" />
	</div>
	<div class="wh-overlay">
		<div class="columns group">
			<div class="main">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<h2><?php single_post_title(); ?></h2>
				<?php the_content(); ?>
				<?php endwhile; else : ?>
					<?php _e( 'Sorry, no posts matched your criteria.' ); ?>
				<?php endif; ?>
			</div><!-- END MAIN -->
			<?php get_sidebar(); ?>
		</div><!-- END COLUMNS -->
	</div>

<?php get_footer(); ?>