<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package MixedNuts
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<!-- #full class wraps the full screen area that it is associated with -->
	<div class="header-area full">

		<!-- #main page styles the header, content, sidebar and footer -->
		<div class="main-page">
			<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'mixednuts' ); ?></a>

			<!-- inner class holds the content specific to this area -->
			<header id="masthead" class="site-header inner" role="banner"> <!-- inner class holds the content important to or specific to this area -->
				<div class="site-branding">
					<img src="http://www.alittlebitofpodunkheaven.dev/wp-content/uploads/2017/04/podunk-heaven-logo.png" border="0" alt="podunk heaven" />
					<!--
					<?php
						if ( is_front_page() && is_home() ) : ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php else : ?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php
						endif;

						$description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) : ?>
						<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
					<?php
					endif; ?>
					-->
				<!-- </div> --> <!-- #site-branding -->

				<nav id="site-navigation" class="main-navigation" role="navigation">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Contents', 'mixednuts' ); ?></button>
					<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu' ) ); ?>
				</nav><!-- #site-navigation -->
				 </div>
			</header><!-- #masthead -->
		</div>
	</div>

	<div class="main-content-area full"><!-- #wrapper content -->
		<div class="main-page">
			<div id="content" class="site-content inner">
