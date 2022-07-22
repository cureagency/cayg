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
		<div class="container-fluid large-topandbottom-padding large-bottom-margin bg-navy background-image" style="background-image: url('<?php the_sub_field('bg_image', 'options'); ?>');">
			<div class="row align-items-center">
				<div class="col-lg-1">
				</div>
		  		<div class="col-lg-6">
			    	<h1 class="white-text"><?php the_sub_field('cta_title', 'options'); ?></h1>
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
					<div class="col-lg-4">
						<p style="font-size: 12px;">The Credential As You Go initiative is supported 100% by the Institute of Education Sciences, U.S. Department of Education, through Grant R305T210063 to SUNY Empire State College. The opinions expressed are those of the authors and do not represent views of the Institute or the U.S. Department of Education.</p>
						<p><a href= "https://credentialasyougo.org/funding-statement/">Funding Statement</a></p>
					</div>
					<div class="col-lg-4">
						<p style="font-size: 12px;">T>&copy; COPYRIGHT 2022 CREDENTIAL AS YOU GO</p>
					</div>
					<div class="col-lg-4">
						<p style="text-align: right; font-size: 12px;">ALL RIGHTS RESERVED</p>
					</div>							
				</div>

			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
