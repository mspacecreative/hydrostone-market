<?php
/*
Template Name: Gallery with Right Sidebar
*/
?>
<?php get_header(); ?>
<div class="header-collage">
	<img src="<?php bloginfo('template_url'); ?>/images/header-collage.jpg" class="full-width" />
	<img src="<?php bloginfo('template_url'); ?>/images/header-collage-sm.jpg" class="full-width mobile" />
</div>
<div class="columns group">
	<div class="main">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<h2><?php single_post_title(); ?></h2>
		<?php the_content(); ?>
		<div id="profiles-container">
			<div id="profiles-inner" class="group">
				<?php if( have_rows('business_logos') ) : while ( have_rows('business_logos') ) : the_row(); ?>
				<div class="box">
					<a href="<?php the_sub_field('link'); ?>" class="fancybox"><img src="<?php the_sub_field('logo'); ?>" class="profile-img" /></a>
				<div class="caption">
				<?php the_sub_field('name'); ?>
			</div>
		</div>
		<?php endwhile; else : endif; ?>
		</div>
		</div>
		<?php endwhile; else : ?>
			<?php _e( 'Sorry, no posts matched your criteria.' ); ?>
		<?php endif; ?>
	</div><!-- END MAIN -->
	<?php get_sidebar( 'sidebar-1' ); ?>
</div><!-- END COLUMNS -->

<?php get_footer(); ?>