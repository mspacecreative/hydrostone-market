<?php
/*
Template Name: Home Page
*/
?>
<?php get_header(); ?>
<div id="ninja-slider" style="/*max-width: 1280px;*/">
	<ul class="slider-container">
		<?php if( have_rows('slider') ):
			while ( have_rows('slider') ) : the_row(); ?>
		<li>
			<div data-image="<?php the_sub_field('slide_img'); ?>" class="slider-img" style="position: relative;">
				<div class="slider-description" style="position: absolute; bottom: 5%; right: 5%; background: rgba(0, 0, 0, .5); padding: 2%; width: 40%; line-height: 25px;">
					<h3 style="text-align: left; margin: 0 0 15px 0; position: relative;"><?php the_sub_field('slide_title'); ?></h3>
					<?php the_sub_field('slide_description'); ?>
				</div>
			</div>
		</li>
		<?php endwhile; else : endif; ?>
	</ul>
</div>
<div class="quote">
	<div class="inner-container">
		<h2><i>Recipient of the Nova Scotia Built Heritage Award</i></h2>
		<p>Designated as a Parks Canada Federal Heritage Site</p>
	</div>
</div>
<div id="services" class="group">
	<div class="photo-container clearfix">
		<div class="photo-box">
			<div class="inner-photo">
				<div class="img-hover">
					<a href="<?php echo site_url(); ?>/eateries"></a>
					<div class="read-more-container">
						<div class="read-more">
							<p><span>Eateries</span></p>
						</div>
					</div>
				</div>
				<img src="<?php bloginfo('template_url'); ?>/images/eateries.jpg" />
			</div>
		</div>
		<div class="photo-box">
			<div class="inner-photo">
				<div class="img-hover">
					<a href="<?php echo site_url(); ?>/shops"></a>
					<div class="read-more-container">
						<div class="read-more">
							<p><span>Shops</span></p>
						</div>
					</div>
				</div>
				<img src="<?php bloginfo('template_url'); ?>/images/shops.jpg" />
			</div>
		</div>
		<div class="photo-box">
			<div class="inner-photo">
				<div class="img-hover">
					<a href="<?php echo site_url(); ?>/services"></a>
					<div class="read-more-container">
						<div class="read-more">
							<p><span>Services</span></p>
						</div>
					</div>
				</div>
				<img src="<?php bloginfo('template_url'); ?>/images/services.jpg" />
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>