<div class="">
	<?php if( have_rows('slide') ): ?>
		<div class="home-slider">			    

			<?php while( have_rows('slide') ): the_row(); 
		        $image = get_sub_field('background_image');
		        ?>

		        <div class="home-slider-slide background-image" style="display: block; position: relative; background-image: url('<?php the_sub_field('image'); ?>');">
		        	<div class="container" style="height: 100%;">
			        	<div class="row" style="height: 100%; display: flex;">
			        		<div class="col" style="align-self: center;">
					        	<h4 class="green-text mb-3"><?php the_sub_field('overline'); ?></h4>
					        	<h1 class="white-text"><?php the_sub_field('header'); ?></h1>
					            <p class="white-text"><?php the_sub_field('paragraph'); ?></p>
					            <p>
					            	<?php if( have_rows('button_1') ): ?>
									    <?php while( have_rows('button_1') ): the_row(); ?>
									       <a href="<?php the_sub_field('url'); ?>"><?php the_sub_field('text'); ?></a>
									    <?php endwhile; ?>
									<?php endif; ?>	

									<?php if( have_rows('button_2') ): ?>
									    <?php while( have_rows('button_2') ): the_row(); ?>
									       <a href="<?php the_sub_field('url'); ?>"><?php the_sub_field('text'); ?></a>
									    <?php endwhile; ?>
									<?php endif; ?>	

					            </p>
					        </div>
				        </div>
				    </div>
		        </div>

		    <?php endwhile; ?>

		</div>
	<?php endif; ?>
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