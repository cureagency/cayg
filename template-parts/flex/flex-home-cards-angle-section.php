<div class="container pt-5 pb-5 mt-5 mb-5">
	<div class="row">
		<div class="col-lg-2">
		</div>		
		<div class="col-lg-6">
			<h4 class="green-text mb-2"><?php the_sub_field('overline'); ?></h4>
			<h1 class="navy-text mb-2"><?php the_sub_field('header'); ?></h1>
		    <p class="navy-text mb-4"><?php the_sub_field('paragraph'); ?></p>
		</div>
		<div class="col-lg-4">
		</div>
	</div>


	<div class="row">
		<?php if( have_rows('card') ): ?>
			<?php while( have_rows('card') ): the_row(); ?>
				<div class="col-lg-4">
					<a href="<?php the_sub_field('link'); ?>">
						<h2><?php the_sub_field('title'); ?></h2>
						<p><?php the_sub_field('paragraph'); ?></p>
					</a>
				</div>
		    <?php endwhile; ?>
		<?php endif; ?>	
	</div>

	<div class="row mt-5 pt-5">
		<div class="col-lg-2">
		</div>		
		<div class="col-lg-6">
			<h4 class="green-text mb-2"><?php the_sub_field('overline'); ?></h4>
		</div>
		<div class="col-lg-4">
		</div>
	</div>


	<div class="row">
		<?php if( have_rows('card_with_image') ): ?>
			<?php while( have_rows('card_with_image') ): the_row(); ?>
				<div class="col-lg-4">
					<a href="<?php the_sub_field('link'); ?>">
						<h2><?php the_sub_field('title_text'); ?></h2>
						<p><?php the_sub_field('description_text'); ?></p>
					</a>
				</div>
		    <?php endwhile; ?>
		<?php endif; ?>	
	</div>


	<div class="row mt-5 mb-5>
		<?php if( have_rows('button') ): ?>
			<?php while( have_rows('button') ): the_row(); ?>
				<div class="col">
					<p style="text-align: center;"><a class="green-button" href="<?php the_sub_field('button_url'); ?>"><?php the_sub_field('button_text'); ?>
					</a></p>
				</div>
		    <?php endwhile; ?>
		<?php endif; ?>	
	</div>
</div>