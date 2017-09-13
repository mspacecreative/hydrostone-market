<!DOCTYPE html>
<html>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php if(is_home()) { echo bloginfo("name"); echo " | "; echo bloginfo("description"); } else { echo wp_title(" | ", false, right); echo bloginfo("name"); } ?></title>
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
		<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
		<!--[if IE]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<!--TYPEKIT-->
		<script src="https://use.typekit.net/tvu6bhi.js"></script>
		<script>try{Typekit.load({ async: true });}catch(e){}</script>
		
		<!-- Add fancyBox -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js" type="text/javascript"></script>
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/js/fancybox/source/jquery.fancybox.css?v=2.1.6" type="text/css" media="screen" />
		<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/fancybox/source/jquery.fancybox.pack.js?v=2.1.6"></script>
		
		<script type="text/javascript">
			$(document).ready(function() {
				$(".fancybox").fancybox();
			});
		</script>
		<!--NINJA SLIDER-->
		<link href="js/css/ninja-slider.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/js/css/ninja-slider.css" />
		<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/ninja-slider.js"></script>
		<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php endif; ?>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class( $class ); ?>>
		<!--GOOGLE ANALYTICS-->
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
		
		  ga('create', 'UA-101292319-1', 'auto');
		  ga('send', 'pageview');
		
		</script>
		<!--GOOGLE ANALYTICS-->
		<header>
			<div style="margin: auto; max-width: 1280px; width: 90%;">
				<nav class="group">
					<!--MENU-->
						<!--SOCIAL MEDIA ICONS-->
						<span class="social"><a href="https://twitter.com/HydrostoneMark1/" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/tw-icon.png" class="social-icon twitter" /></a></span>
						<span class="social"><a href="http://www.facebook.com/pages/The-Hydrostone-Market/372553596149399/" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/fb-icon.png" class="social-icon" /></a></span>
						<!--SOCIAL MEDIA ICONS-->
						
					<?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
					<!--END MENU-->
				</nav>
				<div class="logo">
					<h1><a href="<?php echo get_option('home'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/logo.png"></a></h1>
				</div>
			</div>
		</header>