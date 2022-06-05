<?php
/**
 * Template Name: Old Flexible Template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cure
 */

get_header('old');
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'flex' );

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer('old');
