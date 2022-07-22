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

				    elseif( get_row_layout() == 'home_image_angle_section' ):

				        get_template_part( 'template-parts/flex/flex-home-image-angle-section' );
				    
				    elseif( get_row_layout() == 'home_newsroom_pull_and_testimonial_slider' ):

				        get_template_part( 'template-parts/flex/flex-home-newsroom-pull-and-testimonial-slider' );
	    
				    elseif( get_row_layout() == 'supporting_organizations_slider' ):

				        get_template_part( 'template-parts/flex/flex-supporting-organizations-slider' );
    
				    elseif( get_row_layout() == 'cta_block_on_angle_bg' ):

				        get_template_part( 'template-parts/flex/flex-cta-block-on-angle-bg' );

				    elseif( get_row_layout() == 'title_section_with_breadcrumbs' ):

				        get_template_part( 'template-parts/flex/flex-title-section-with-breadcrumbs' );

				    elseif( get_row_layout() == 'title_section' ):

				        get_template_part( 'template-parts/flex/flex-title-section' );

				    elseif( get_row_layout() == '1_column_wysiwyg' ):

				        get_template_part( 'template-parts/flex/flex-1-column-wysiwyg' );

				    elseif( get_row_layout() == '2_column_wysiwyg' ):

				        get_template_part( 'template-parts/flex/flex-2-column-wysiwyg' );

				    elseif( get_row_layout() == '2_column_cta' ):

				        get_template_part( 'template-parts/flex/flex-2-column-cta' );

				    elseif( get_row_layout() == '2_column_text_with_fluid_width_image' ):

				        get_template_part( 'template-parts/flex/flex-2-column-text-with-fluid-width-image' );

				    elseif( get_row_layout() == '2_column_title_paragraph' ):

				        get_template_part( 'template-parts/flex/flex-2-column-title-paragraph' );

				    elseif( get_row_layout() == '3_column_wysiwyg' ):

				        get_template_part( 'template-parts/flex/flex-3-column-wysiwyg' );

				    elseif( get_row_layout() == '2_column_image_and_cta_text' ):

				        get_template_part( 'template-parts/flex/flex-2-column-image-and-cta-text' );

				    elseif( get_row_layout() == 'centered_title_and_4_stacked_cards' ):

				        get_template_part( 'template-parts/flex/flex-centered-title-and-4-stacked-cards' );

			        elseif( get_row_layout() == 'post_slider' ):

			        	get_template_part( 'template-parts/flex/flex-header-post-slider' );

			        elseif( get_row_layout() == 'national_advisory_board_full_pull' ):

			        	get_template_part( 'template-parts/flex/flex-national-advisory-board-full-pull' );

			        elseif( get_row_layout() == 'team_full_pull' ):

			        	get_template_part( 'template-parts/flex/flex-team-full-pull' );

			        elseif( get_row_layout() == 'blog_full_pull' ):

			        	get_template_part( 'template-parts/flex/flex-blog-full-pull' );

			        elseif( get_row_layout() == 'inthenews_full_pull' ):

			        	get_template_part( 'template-parts/flex/flex-inthenews-full-pull' );

			        elseif( get_row_layout() == 'mediakit_full_pull' ):

			        	get_template_part( 'template-parts/flex/flex-mediakit-full-pull' );

			        elseif( get_row_layout() == 'newsletter_full_pull' ):

			        	get_template_part( 'template-parts/flex/flex-newsletter-full-pull' );

			        elseif( get_row_layout() == 'pressreleases_full_pull' ):

			        	get_template_part( 'template-parts/flex/flex-pressreleases-full-pull' );

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
