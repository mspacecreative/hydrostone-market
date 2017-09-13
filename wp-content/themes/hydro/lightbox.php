<div class="gallery_grid clearfix">
	<?php if( have_rows('lightbox') ):
		while ( have_rows('lightbox') ) : the_row();
		
		$imageID = get_sub_field('lb_thumb');
		$image = wp_get_attachment_image_src( $imageID, 'full' );
		$alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true); ?>
	
	<div class="gallery-img">
		<a class="fancybox" title="<?php the_sub_field('caption'); ?>" rel="<?php the_sub_field('group'); ?>" href="<?php the_sub_field('lb_img'); ?>">
			<img src="<?php echo $image[0]; ?>" alt="<?php echo $alt_text; ?>" />
		</a>
		<div class="thumb-hover">
			<i class="fa fa-search-plus zoom-icon"></i>
		</div>
	</div>
	
	<?php endwhile; else : endif; ?>
</div>