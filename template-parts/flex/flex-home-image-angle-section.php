<div class="container-fluid" >
	<div class="container">
		<div class="row mt-5 mb-5">
			<div class="col-lg-6">
				<div class="row">
    				<div class="col-lg-1">
	        			<p class="green-text"><i class="fa-solid fa-dash"></i></p>
	        		</div>
	         		<div class="col-lg-11">
						<h4 class="green-text mb-2"><?php the_sub_field('overline'); ?></h4>
						<h1 class="navy-text mb-2"><?php the_sub_field('header'); ?></h1>
					    <p class="navy-text mb-4"><?php the_sub_field('paragraph'); ?></p>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
			</div>
		</div>
	</div>

	<div class="container bg-lightblue border-radius pt-5 pb-5 mt-5 top-z-index">
		<div class="row">
			<div class="col-lg-12 center-text">
				<h4 class="navy-text"><?php the_sub_field('image_header'); ?></h4>
			</div>
		</div>
		<div class="row home-framework-card-wrap">
			<div class="home-framework-card-image background-image" style="background-image: url('<?php the_sub_field('image'); ?>');">
			</div>
		</div>
	</div>
</div>

<div class="angle-top-bg-navy">
</div>

<div class="container-fluid bg-navy pt-5 pb-5">

	<div class="container">
		<div class="row mt-5 pt-5">
			<div class="col-lg-8">
				<div class="row">
    				<div class="col-lg-1">
	        			<p class="green-text"><i class="fa-solid fa-dash"></i></p>
	        		</div>
	        		<div class="col-lg-1">
						<h4 class="green-text mb-2"><?php the_sub_field('overline'); ?></h4>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
			</div>
		</div>


		<div class="row mt-5">
			<?php if( have_rows('card_with_image') ): ?>
				<?php while( have_rows('card_with_image') ): the_row(); ?>
					<div class="col-lg-4">
						<div class="home-research-card">
							<a href="<?php the_sub_field('link'); ?>">
								<h2><?php the_sub_field('title_text'); ?></h2>
								<p><?php the_sub_field('description_text'); ?></p>
							</a>
						</div>
						<div class="home-research-card-image background-image" style="background-image: url('<?php the_sub_field('image'); ?>');">
						</div>
					</div>
			    <?php endwhile; ?>
			<?php endif; ?>	
		</div>


		<div class="row mt-5 mb-5">
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
</div>