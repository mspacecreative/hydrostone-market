<?php
/*
Template Name: Shops
*/
?>
<?php get_header(); ?>
<body <?php body_class( $class ); ?>>
	<div class="header-collage">
		<img src="<?php bloginfo('template_url'); ?>/images/header-collage.jpg" class="full-width" />
		<img src="<?php bloginfo('template_url'); ?>/images/header-collage-sm.jpg" class="full-width mobile" />
	</div>
	<div class="columns group">
		<div class="main clearfix">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<h2><?php single_post_title(); ?>
			<span class="rest-info">
				<ul>
					<?php if( have_rows('contact_info') ) : while ( have_rows('contact_info') ) : the_row(); ?>
					<li><span>Address:</span> <?php the_sub_field('address'); ?></li>
					<li><span>Phone:</span> <?php the_sub_field('phone-number'); ?></li>
					<li><a class="visit-site-button" href="<?php the_sub_field('web-link'); ?>" target="_blank">Visit Site</a></li>
					<?php endwhile; else : endif; ?>
				</ul>
			</span>
			</h2>
			<?php the_content(); ?>
			<?php endwhile; else : ?>
				<?php _e( 'Sorry, no posts matched your criteria.' ); ?>
			<?php endif; ?>
			
			<!--GALLERY-->
			<?php echo do_shortcode('[lightbox-popup]'); ?>
			<!--GALLERY-->
			
		</div><!-- END MAIN -->
		<?php get_sidebar( 'shops' ); ?>
	</div><!-- END COLUMNS -->

<?php get_footer(); ?>