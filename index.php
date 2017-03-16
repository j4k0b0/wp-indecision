<?php get_header(); ?>

<div class="container page">
	<?php
	if ( have_posts() ) :
		while ( have_posts() ) : the_post();
	?>

		<h1><?php the_title(); ?></h1>

		<?php the_content(); ?>

		<?php if( get_field('set_indecisions') ) :

			include('inc/indecisions-template.php');

		endif; ?>

	<?php
		endwhile;
	endif;
	?>
</div>

<?php get_footer(); ?>