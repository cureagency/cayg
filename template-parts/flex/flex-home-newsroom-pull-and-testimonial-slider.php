<div class="container pt-5 pb-5">
	<div class="row align-items-center">
  		<div class="col-lg-8">
			<h4 class="blue-text mb-2"><?php the_sub_field('onews_overline'); ?></h4>
	    	<h1 class="mb-2"><?php the_sub_field('newsroom_title'); ?></h1>
	        <p>
	        	<?php if( have_rows('newsroom_button') ): ?>
				    <?php while( have_rows('newsroom_button') ): the_row(); ?>
				       <a class="blue-button" href="<?php the_sub_field('button_url'); ?>"><?php the_sub_field('button_text'); ?></a>
				    <?php endwhile; ?>
				<?php endif; ?>	
	        </p>
	  	</div>
	  	<div class="col-lg-4">
			Testimonials Section
	  	</div>
	</div>
</div>
