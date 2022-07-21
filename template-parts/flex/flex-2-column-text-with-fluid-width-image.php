<div class="container-fluid bg-navy <?php the_sub_field('top_margin'); ?>-top-margin <?php the_sub_field('bottom_margin'); ?>-bottom-margin" id="<?php the_sub_field('anchor_link'); ?>">
	<div class="row">
		<div class="col-lg-1">
		</div>
		<?php if( have_rows('content_col') ): ?>
		    <?php while( have_rows('content_col') ): the_row(); ?>
				<div class="col-lg-4 large-topandbottom-padding">
					<div class="row ">
						<div class="col-lg-1">
							<p class="green-text">
					    		<i class="fa-solid fa-dash"></i>
					    	</p>
					    </div>
				  		<div class="col-lg-11">
				  			<h4 class="green-text"><?php the_sub_field('overline'); ?></h4>
				  		</div>
				  	</div>
					<div class="row">
						<div class="col-lg-1">
					    </div>
				  		<div class="col-lg-11">
					    	<h1 class="white-text"><?php the_sub_field('title'); ?></h1>
					    	<div class="white-text small-bottom-margin"><?php the_sub_field('paragraph'); ?></div>
					    	<?php if( have_rows('button') ): ?>
		    					<?php while( have_rows('button') ): the_row(); ?>
		    						<a href="<?php the_sub_field('link'); ?>" class="green-button"><?php the_sub_field('button_text'); ?></a>
							    <?php endwhile; ?>
							<?php endif; ?>
					  	</div>
					</div>
				</div>
		    <?php endwhile; ?>
		<?php endif; ?>

		<div class="col-lg-7 background-image" style="background-image:url('<?php echo esc_url(get_sub_field('image')['url']); ?>');">
		</div>

	</div>
</div>