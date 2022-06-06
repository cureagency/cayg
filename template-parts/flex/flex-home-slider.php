<div style="z-index: 20;">
	<?php if( have_rows('slide') ): ?>
		<div class="home-slider">			    

			<?php while( have_rows('slide') ): the_row(); 
		        $image = get_sub_field('background_image');
		        ?>

		        <div class="home-slider-slide background-image" style="display: block; position: relative; background-image: url('<?php the_sub_field('image'); ?>');">
		        	<div class="container" style="height: 100%;">
			        	<div class="row" style="height: 100%; display: flex;">
			        		<div class="col-lg-6" style="align-self: center;">
					        	<h4 class="green-text mb-2"><?php the_sub_field('overline'); ?></h4>
					        	<h1 class="white-text mb-2"><?php the_sub_field('header'); ?></h1>
					            <p class="white-text mb-4"><?php the_sub_field('paragraph'); ?></p>
					            <p>
					            	<?php if( have_rows('button_1') ): ?>
									    <?php while( have_rows('button_1') ): the_row(); ?>
									       <a class="green-button" href="<?php the_sub_field('url'); ?>"><?php the_sub_field('text'); ?></a>
									    <?php endwhile; ?>
									<?php endif; ?>	

									<?php if( have_rows('button_2') ): ?>
									    <?php while( have_rows('button_2') ): the_row(); ?>
									       <a class="nobg-button" href="<?php the_sub_field('url'); ?>"><?php the_sub_field('text'); ?></a>
									    <?php endwhile; ?>
									<?php endif; ?>	

					            </p>
					        </div>
					        <div class="col-lg-6">
					        </div>
				        </div>
				    </div>
		        </div>

		    <?php endwhile; ?>

		</div>
	<?php endif; ?>
</div>

<div class="container">
	<div class="row align-items-center bg-white home-slider-overlay">
		<?php if( have_rows('overlay_button') ): ?>
			<?php while( have_rows('overlay_button') ): the_row(); ?>
				<div class="col-lg-4">
					<a href="<?php the_sub_field('link'); ?>">
						<div class="home-slider-overlay-portion pt-2 pb-2">
							<h2><?php the_sub_field('title_text'); ?></h2>
							<p><?php the_sub_field('description_text'); ?></p>
					    </div>
					</a>
				</div>
		    <?php endwhile; ?>
		<?php endif; ?>	
	</div>
</div>


<script>
	jQuery(function($){
		$('.home-slider').slick({
			  dots: true,
  			  infinite: true,
  			  arrows: false
		});
	});
</script>