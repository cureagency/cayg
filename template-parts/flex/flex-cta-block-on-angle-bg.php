<div class="container mt-5 mb-5 pt-5 pb-5 bg-navy border-radius background-image" style="background-image: url('<?php the_sub_field('bg_image'); ?>');">
	<div class="row align-items-center">
		<div class="col-lg-1">
		</div>
  		<div class="col-lg-6">
	    	<h1 class="mb-2 white-text"><?php the_sub_field('cta_title'); ?></h1>
	  	</div>
	  	<div class="col-lg-4" style="text-align: right;">
	    	<?php if( have_rows('button') ): ?>
			    <?php while( have_rows('button') ): the_row(); ?>
			       <a class="lightblue-button" href="<?php the_sub_field('url'); ?>"><?php the_sub_field('text'); ?></a>
			    <?php endwhile; ?>
			<?php endif; ?>	
	  	</div>
		<div class="col-lg-1">
		</div>
	</div>
</div>
