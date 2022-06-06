<div class="container mt-5 mb-5 pt-5 pb-5 bg-navy border-radius">
	<div class="row">
		<div class="col-lg-1">
		</div>
  		<div class="col-lg-6">
	    	<h1 class="mb-2 white-text"><?php the_sub_field('cta_title'); ?></h1>
	  	</div>
	  	<div class="col-lg-4" style="text-align: right;">
	    	<?php if( have_rows('newsroom_button') ): ?>
			    <?php while( have_rows('newsroom_button') ): the_row(); ?>
			       <a class="blue-button" href="<?php the_sub_field('button_url'); ?>"><?php the_sub_field('button_text'); ?></a>
			    <?php endwhile; ?>
			<?php endif; ?>	
	  	</div>
		<div class="col-lg-1">
		</div>
	</div>
</div>
