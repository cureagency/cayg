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

<?php if( have_rows('cta_block_on_angle_bg', 'options') ): ?>
	<?php while( have_rows('cta_block_on_angle_bg', 'options') ): the_row(); ?>
		<div class="container-fluid mt-5 mb-5 pt-5 pb-5 bg-navy background-image" style="background-image: url('<?php the_sub_field('bg_image', 'options'); ?>');">
			<div class="row align-items-center">
				<div class="col-lg-1">
				</div>
		  		<div class="col-lg-6">
			    	<h1 class="mb-2 white-text"><?php the_sub_field('cta_title', 'options'); ?></h1>
			  	</div>
			  	<div class="col-lg-4" style="text-align: right;">
			    	<?php if( have_rows('button', 'options') ): ?>
					    <?php while( have_rows('button', 'options') ): the_row(); ?>
					       <a class="lightblue-button" href="<?php the_sub_field('url', 'option'); ?>"><?php the_sub_field('text', 'options'); ?></a>
					    <?php endwhile; ?>
					<?php endif; ?>	
			  	</div>
				<div class="col-lg-1">
				</div>
			</div>
		</div>
    <?php endwhile; ?>
<?php endif; ?>	

	<footer id="colophon" class="site-footer">

		<div class="site-info">
			<div class="container">
				
				<div class="row pt-2 pb-5">
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
