<?php
/*
Template Name: Service with sidebar
*/
?>
<?php get_header(); ?>
<div class="header-collage">
	<img src="<?php bloginfo('template_url'); ?>/images/header-collage.jpg" class="full-width" />
</div>
<div class="wh-overlay">
	<div class="columns group">
		<div class="main">
		<section class="error-404 not-found">
						<header class="page-header">
							<h1 style="color: #000;"><?php _e( 'Oops! That page can&rsquo;t be found.', 'twentysixteen' ); ?></h1>
						</header><!-- .page-header -->
		
						<div class="page-content">
							<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'twentysixteen' ); ?></p>
		
							<?php get_search_form(); ?>
						</div><!-- .page-content -->
					</section><!-- .error-404 -->
		</div><!-- END MAIN -->
		<?php get_sidebar( 'service' ); ?>
	</div><!-- END COLUMNS -->
</div>

<?php get_footer(); ?>