<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cure
 */

?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="container" style="margin: 100px auto;">
		<div class="row">
			<div class="col-lg">
			</div>
			<div class="col-lg-10">	
				<header class="entry-header">
					<?php
					if ( is_singular() ) :
						the_title( '<h1 class="entry-title">', '</h1>' );
					else :
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					endif; ?>
				</header><!-- .entry-header -->

				<?php cure_post_thumbnail(); ?>

				<div class="entry-content">
					<?php
					the_content(
						sprintf(
							wp_kses(
								/* translators: %s: Name of current post. Only visible to screen readers */
								__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'cure' ),
								array(
									'span' => array(
										'class' => array(),
									),
								)
							),
							wp_kses_post( get_the_title() )
						)
					);

					wp_link_pages(
						array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'cure' ),
							'after'  => '</div>',
						)
					);
					?>
				</div><!-- .entry-content -->

			</div>
			<div class="col-lg">
			</div>
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->

