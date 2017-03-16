<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>

	<header>
		<div class="container group">
			<div id="logo">
				<a href="#">Indecisions</a>
			</div>
			<nav id="top-navigation" class="group">
				<?php wp_nav_menu( array( 'theme_location' => 'main-navigation', 'container' => '') ); ?>
			</nav>
		</div>
	</header>