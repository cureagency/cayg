<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cure
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<div class="container">
				
				<div class="row">
					<div class="col-lg-4">
						<?php the_field('column_1', 'options'); ?>
					</div>
					<div class="col-lg-2">
						<?php the_field('column_2', 'options'); ?>
					</div>	
					<div class="col-lg-2">
						<?php the_field('column_3', 'options'); ?>
					</div>	
					<div class="col-lg-2">
						<?php the_field('column_4', 'options'); ?>
					</div>	
					<div class="col-lg-2">
						<?php the_field('column_5', 'options'); ?>
					</div>					
				</div>

				<div class="row">
					<div class="col-lg-6">
						<p>Copyright 2022 CAYG</p>
					</div>
					<div class="col-lg-6">
						<p style="text-align: right;">All Rights Reserved</p>
					</div>							
				</div>

			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
