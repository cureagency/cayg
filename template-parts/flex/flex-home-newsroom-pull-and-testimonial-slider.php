<div class="container-fluid pt-5 pb-5">
	<div class="row align-items-center">
  		<div class="col-lg-8 green-gradient-bg newsroom-bg">
  			<div class="row">
  				<div class="col-lg-1">
  				</div>
  				<div class="col-lg-6">
					<h4 class="white-text mb-2"><?php the_sub_field('newsroom_overline'); ?></h4>
			    	<h1 class="white-text mb-2"><?php the_sub_field('newsroom_title'); ?></h1>
			    </div>
			    <div class="col-lg-4" style="text-align:right;">
			        <p>
			        	<?php if( have_rows('newsroom_button') ): ?>
						    <?php while( have_rows('newsroom_button') ): the_row(); ?>
						       <a class="blue-button" href="<?php the_sub_field('button_url'); ?>"><?php the_sub_field('button_text'); ?></a>
						    <?php endwhile; ?>
						<?php endif; ?>	
			        </p>
			    </div>
  				<div class="col-lg-1">
  				</div>
		    </div>
	  	</div>
	  	<div class="col-lg-4 bg-lightblue testimonial-bg">
			Testimonials Section
	  	</div>
	</div>
</div>
