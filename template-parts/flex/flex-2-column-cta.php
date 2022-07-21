<div class="container <?php the_sub_field('top_margin'); ?>-top-margin <?php the_sub_field('bottom_margin'); ?>-bottom-margin" id="<?php the_sub_field('anchor_link'); ?>">
	<div class="row">

		<?php if( have_rows('content_col_1') ): ?>
		    <?php while( have_rows('content_col_1') ): the_row(); ?>
				<div class="col-lg-6 bg-lightblue large-topandbottom-padding">
					<div class="row ">
				  		<div class="col-lg-2">
					  	</div>
				  		<div class="col-lg-8">
					    	<h1><?php the_sub_field('title'); ?></h1>
					  	</div>
					  	<div class="col-lg-2">
					  	</div>
					</div>
					<div class="row small-topandbottom-padding">
						<div class="col-lg-1">
						</div>
				  		<div class="col-lg-4">
				  			<div class="horizontal-grayblue-line">
				  			</div>
					  	</div>
				  		<div class="col-lg-7">
					  	</div>
					</div>
					<div class="row ">
				  		<div class="col-lg-2">
					  	</div>
				  		<div class="col-lg-8">
					    	<p><?php the_sub_field('paragraph'); ?></p>
					    	<?php if( have_rows('button') ): ?>
		    					<?php while( have_rows('button') ): the_row(); ?>
		    						<a href="<?php the_sub_field('link'); ?>" class="arrow-button"><?php the_sub_field('button_text'); ?></a>
							    <?php endwhile; ?>
							<?php endif; ?>
					  	</div>
					  	<div class="col-lg-2">
					  	</div>
					</div>
				</div>
		    <?php endwhile; ?>
		<?php endif; ?>

		<?php if( have_rows('content_col_2') ): ?>
		    <?php while( have_rows('content_col_2') ): the_row(); ?>
				<div class="col-lg-6 green-gradient-bg large-topandbottom-padding">
					<div class="row ">
				  		<div class="col-lg-2">
					  	</div>
				  		<div class="col-lg-8">
					    	<h1 class="white-text"><?php the_sub_field('title'); ?></h1>
					  	</div>
					  	<div class="col-lg-2">
					  	</div>
					</div>
					<div class="row small-topandbottom-padding">
						<div class="col-lg-1">
						</div>
				  		<div class="col-lg-4">
				  			<div class="horizontal-white-line">
				  			</div>
					  	</div>
				  		<div class="col-lg-7">
					  	</div>
					</div>
					<div class="row ">
				  		<div class="col-lg-2">
					  	</div>
				  		<div class="col-lg-8">
					    	<p class="white-text"><?php the_sub_field('paragraph'); ?></p>
					    	<?php if( have_rows('button') ): ?>
		    					<?php while( have_rows('button') ): the_row(); ?>
		    						<a href="<?php the_sub_field('link'); ?>" class="arrow-button"><?php the_sub_field('button_text'); ?></a>
							    <?php endwhile; ?>
							<?php endif; ?>
					  	</div>
					  	<div class="col-lg-2">
					  	</div>
					</div>
				</div>
		    <?php endwhile; ?>
		<?php endif; ?>

	</div>
</div>