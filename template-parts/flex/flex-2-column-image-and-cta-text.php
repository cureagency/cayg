<div class="container <?php the_sub_field('top_margin'); ?>-top-margin <?php the_sub_field('bottom_margin'); ?>-bottom-margin" id="<?php the_sub_field('anchor_link'); ?>">

	<div class="row align-items-center">

		<?php if( get_sub_field('orientation') == 'img-left' ) { ?>

		  		<div class="col-lg-5">
		  			<?php if( get_sub_field('image') ): ?>
					    <img class="border-radius" src="<?php the_sub_field('image'); ?>" />
					<?php endif; ?>
			  	</div>
			  	<div class="col-lg-1">
			  	</div>
			  	<div class="col-lg-5">
					<h4 class="blue-text mb-2"><?php the_sub_field('overline'); ?></h4>
			    	<h1 class="mb-2"><?php the_sub_field('title'); ?></h1>
			        <p class="mb-4"><?php the_sub_field('paragraph'); ?></p>
			        <p>
			        	<?php if( have_rows('button_1') ): ?>
						    <?php while( have_rows('button_1') ): the_row(); ?>
						    	<?php if( get_sub_field('url') ): ?>
							       <a class="blue-button" href="<?php the_sub_field('url'); ?>"><?php the_sub_field('text'); ?></a>
							    <?php endif; ?>	
						    <?php endwhile; ?>
						<?php endif; ?>	

						<?php if( have_rows('button_2') ): ?>
						    <?php while( have_rows('button_2') ): the_row(); ?>
						    	<?php if( get_sub_field('url') ): ?>
							       <a class="nobg-blue-button" href="<?php the_sub_field('url'); ?>"><?php the_sub_field('text'); ?></a>
							     <?php endif; ?>	
						    <?php endwhile; ?>
						<?php endif; ?>	

			        </p>
			  	</div>
			    <div class="col-lg-1">
			  	</div>


		<?php } ?>

		<?php if( get_sub_field('orientation') == 'img-right' ) { ?>

			    <div class="col-lg-1">
			  	</div>
			  	<div class="col-lg-5">
					<h4 class="blue-text mb-2"><?php the_sub_field('overline'); ?></h4>
			    	<h1 class="mb-2"><?php the_sub_field('title'); ?></h1>
			        <p class="mb-4"><?php the_sub_field('paragraph'); ?></p>
			        <p>
			        	<?php if( have_rows('button_1') ): ?>
						    <?php while( have_rows('button_1') ): the_row(); ?>
						       <a class="blue-button" href="<?php the_sub_field('url'); ?>"><?php the_sub_field('text'); ?></a>
						    <?php endwhile; ?>
						<?php endif; ?>	

						<?php if( have_rows('button_2') ): ?>
						    <?php while( have_rows('button_2') ): the_row(); ?>
						       <a class="nobg-blue-button" href="<?php the_sub_field('url'); ?>"><?php the_sub_field('text'); ?></a>
						    <?php endwhile; ?>
						<?php endif; ?>	

			        </p>
			  	</div>
			    <div class="col-lg-1">
			  	</div>
			  	<div class="col-lg-5">
		  			<?php if( get_sub_field('image') ): ?>
					    <img class="border-radius" src="<?php the_sub_field('image'); ?>" />
					<?php endif; ?>
			  	</div>

		<?php } ?>
	</div>
</div>


