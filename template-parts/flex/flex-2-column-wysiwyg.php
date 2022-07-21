<div class="container <?php the_sub_field('top_margin'); ?>-top-margin <?php the_sub_field('bottom_margin'); ?>-bottom-margin" id="<?php the_sub_field('anchor_link'); ?>">

	<?php if( get_sub_field('overline') ): ?>
		<div class="row align-items-center">
	  		<div class="col-lg-1">
		    	<p class="green-text">
		    		<i class="fa-solid fa-dash"></i>
		    	</p>
		  	</div>
	  		<div class="col-lg-11">
		    	<h4 class="green-text"><?php the_sub_field('overline'); ?></h4>
		  	</div>
		</div>
	<?php endif; ?>
	<?php if( get_sub_field('title') ): ?>
		<div class="row small-bottom-margin">
	  		<div class="col-lg-1">
		  	</div>
	  		<div class="col-lg-8">
		    	<h1><?php the_sub_field('title'); ?></h1>
		  	</div>
		  	<div class="col-lg-3">
		  	</div>
		</div>
	<?php endif; ?>

	<div class="row">
		<div class="col-lg-1">
	  	</div>
  		<div class="col-lg-5">
	    	<?php the_sub_field('content_col_1'); ?>
	  	</div>
  		<div class="col-lg-5">
	    	<?php the_sub_field('content_col_2'); ?>
	  	</div>
		<div class="col-lg-1">
	  	</div>
	</div>

</div>