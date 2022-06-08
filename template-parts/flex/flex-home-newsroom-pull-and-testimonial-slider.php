<div class="container-fluid pt-5 pb-5">
	<div class="row">
  		<div class="col-lg-8 green-gradient-bg newsroom-bg">
  			<div class="row">
  				<div class="col-lg-1">
  				</div>
  				<div class="col-lg-6">
					<h4 class="white-text mb-2"><?php the_sub_field('newsroom_overline'); ?></h4>
			    	<h1 class="white-text"><?php the_sub_field('newsroom_title'); ?></h1>
			    </div>
			    <div class="col-lg-4 align-self-end" style="text-align:right;">
			        <p>
			        	<?php if( have_rows('newsroom_button') ): ?>
						    <?php while( have_rows('newsroom_button') ): the_row(); ?>
						       <a class="white-border-button" href="<?php the_sub_field('button_url'); ?>"><?php the_sub_field('button_text'); ?></a>
						    <?php endwhile; ?>
						<?php endif; ?>	
			        </p>
			    </div>
  				<div class="col-lg-1">
  				</div>
		    </div>
	  	</div>
	  	<div class="col-lg-4 bg-lightblue testimonial-bg">
		    <?php if( have_rows('testimonials') ): ?>
		    	<div class="testimonials-slider">
					<?php while( have_rows('testimonials') ): the_row(); ?>
						<div class="testimonials-slide" style="padding: 0 20px;">
							<?php if( get_sub_field('headshot') ): ?>
							    <img class="imageincircle mb-3" src="<?php the_sub_field('headshot'); ?>" />
							<?php endif; ?>
							<p style="text-align: center;">"<?php the_sub_field('quote'); ?>"</p>
			    			<p style="text-align: center;"><strong><?php the_sub_field('attribution'); ?></strong></p>
						</div>
				    <?php endwhile; ?>
				</div>
			<?php endif; ?>	
		</div>

		<script>
			jQuery(function($){
				$('.testimonials-slider').slick({
				  slidesToShow: 1,
				  slidesToScroll: 1,
				  autoplay: true,
				  arrows: false,
				  dots: true,
				  autoplaySpeed: 4000,
				});
			});
		</script>
	  	</div>
	</div>
</div>
