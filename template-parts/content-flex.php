<?php
/**
 * Template part for displaying page content in flexible-template.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cure
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="margin: 0;">
	
	<div class="entry-content" style="margin: 0;">

		<?php

			// Check value exists.
			if( have_rows('content') ):

			    // Loop through rows.
			    while ( have_rows('content') ) : the_row();

			        if( get_row_layout() == 'home_slider' ):

			        	get_template_part( 'template-parts/flex/flex-home-slider' );


				    elseif( get_row_layout() == 'home_cards_angle_section' ):

				        get_template_part( 'template-parts/flex/flex-home-cards-angle-section' );


			        elseif( get_row_layout() == 'post_slider' ):

			        	get_template_part( 'template-parts/flex/flex-header-post-slider' );


			        elseif( get_row_layout() == '3_calls_to_action' ): 

			        	get_template_part( 'template-parts/flex/flex-3-col-cta' );

			        endif;

			    // End loop.
			    endwhile;

			// No value.
			else :
			    // Do something...
			endif;
		?>
		
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
