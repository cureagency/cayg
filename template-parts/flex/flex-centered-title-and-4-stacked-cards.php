<div class="container <?php the_sub_field('top_margin'); ?>-top-margin <?php the_sub_field('bottom_margin'); ?>-bottom-margin" id="<?php the_sub_field('anchor_link'); ?>">

	<div class="row">
		<div class="col-lg-1">
	  	</div>
  		<div class="col-lg-10">
	    	<h1 class="center-text small-bottom-margin"><?php the_sub_field('title'); ?></h1>
	    	<p class="center-text small-bottom-margin"><?php the_sub_field('paragraph'); ?></p>
	  	</div>
		<div class="col-lg-1">
	  	</div>
	</div>

	<div class="row">
		<div class="col-lg-1">
	  	</div>
  		<div class="col-lg-5">
	    <?php if( have_rows('card_1') ): ?>
		    <?php while( have_rows('card_1') ): the_row(); ?>
				<div class="row ">
			  		<div class="col-lg-4">
			  			<img src="<?php the_sub_field('image_or_icon'); ?>">
				  	</div>
			  		<div class="col-lg-8">
			  			<h3><?php the_sub_field('title'); ?></h3>
				    	<p><?php the_sub_field('paragraph'); ?></p>
				    	<?php if( have_rows('button') ): ?>
	    					<?php while( have_rows('button') ): the_row(); ?>
	    						<a href="<?php the_sub_field('link'); ?>" class="green-button-justtext"><?php the_sub_field('button_text'); ?></a>
						    <?php endwhile; ?>
						<?php endif; ?>
				  	</div>
				</div>
		    <?php endwhile; ?>
		<?php endif; ?>
	  	</div>
		<div class="col-lg-5">
	    <?php if( have_rows('card_2') ): ?>
		    <?php while( have_rows('card_2') ): the_row(); ?>
				<div class="row ">
			  		<div class="col-lg-4">
			  			<img src="<?php the_sub_field('image_or_icon'); ?>">
				  	</div>
			  		<div class="col-lg-8">
			  			<h3><?php the_sub_field('title'); ?></h3>
				    	<p><?php the_sub_field('paragraph'); ?></p>
				    	<?php if( have_rows('button') ): ?>
	    					<?php while( have_rows('button') ): the_row(); ?>
	    						<a href="<?php the_sub_field('link'); ?>" class="green-button-justtext"><?php the_sub_field('button_text'); ?></a>
						    <?php endwhile; ?>
						<?php endif; ?>
				  	</div>
				</div>
		    <?php endwhile; ?>
		<?php endif; ?>
	  	</div>
		<div class="col-lg-1">
	  	</div>
	</div>
	<div class="row">
		<div class="col-lg-1">
	  	</div>
  		<div class="col-lg-5">
	    <?php if( have_rows('card_3') ): ?>
		    <?php while( have_rows('card_3') ): the_row(); ?>
				<div class="row ">
			  		<div class="col-lg-4">
			  			<img src="<?php the_sub_field('image_or_icon'); ?>">
				  	</div>
			  		<div class="col-lg-8">
			  			<h3><?php the_sub_field('title'); ?></h3>
				    	<p><?php the_sub_field('paragraph'); ?></p>
				    	<?php if( have_rows('button') ): ?>
	    					<?php while( have_rows('button') ): the_row(); ?>
	    						<a href="<?php the_sub_field('link'); ?>" class="green-button-justtext"><?php the_sub_field('button_text'); ?></a>
						    <?php endwhile; ?>
						<?php endif; ?>
				  	</div>
				</div>
		    <?php endwhile; ?>
		<?php endif; ?>
	  	</div>
		<div class="col-lg-5">
	    <?php if( have_rows('card_4') ): ?>
		    <?php while( have_rows('card_4') ): the_row(); ?>
				<div class="row ">
			  		<div class="col-lg-4">
			  			<img src="<?php the_sub_field('image_or_icon'); ?>">
				  	</div>
			  		<div class="col-lg-8">
			  			<h3><?php the_sub_field('title'); ?></h3>
				    	<p><?php the_sub_field('paragraph'); ?></p>
				    	<?php if( have_rows('button') ): ?>
	    					<?php while( have_rows('button') ): the_row(); ?>
	    						<a href="<?php the_sub_field('link'); ?>" class="green-button-justtext"><?php the_sub_field('button_text'); ?></a>
						    <?php endwhile; ?>
						<?php endif; ?>
				  	</div>
				</div>
		    <?php endwhile; ?>
		<?php endif; ?>
	  	</div>
		<div class="col-lg-1">
	  	</div>
	</div>
</div>