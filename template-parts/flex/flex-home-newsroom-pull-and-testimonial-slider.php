<div class="container-fluid pt-5 pb-5">
	<div class="row">

  		<div class="col-lg-7 green-gradient-bg newsroom-bg">
  			<div class="row">
  				<div class="col-lg-1">
  				</div>
  				<div class="col-lg-6">
					<h4 class="white-text mb-2"><?php the_sub_field('newsroom_overline'); ?></h4>
			    	<h1 class="white-text"><?php the_sub_field('newsroom_title'); ?></h1>
			    </div>
			    <div class="col-lg-4 align-self-end" style="text-align:right;">
			        <p>
			        	<?php if( have_rows('newsroom_button') ): ?>
						    <?php while( have_rows('newsroom_button') ): the_row(); ?>
						       <a class="white-border-button" href="<?php the_sub_field('button_url'); ?>"><?php the_sub_field('button_text'); ?></a>
						    <?php endwhile; ?>
						<?php endif; ?>	
			        </p>
			    </div>
  				<div class="col-lg-1">
  				</div>
		    </div>
		    <div class="row">
		    	<div class="col-lg-1">
  				</div>
		    	<div class="col-lg-10">
		    		<div class="row newsroom-featured-posts-wrap row-eq-height">
						<?php
						    $args = array('posts_per_page' => 2);
							$query = new WP_Query( $args );
							while( $query->have_posts()) : $query->the_post(); ?>
							<div class="col-lg-6 mb-4">
					        	<div class="newsroom-featured-posts">
									<a href="<?php the_permalink(); ?>">
										<h4 class="green-text"><?php echo get_the_date(); ?></h4>
										<h2 class="mb-5"><?php echo get_the_title(); ?></h2>
										<h4 class="read-more-link blue-text" style="text-align: right;">Read More  <i class="fa-solid fa-angle-right"></i></h4>
									</a>
					            </div>
							</div>
						<?php endwhile;  wp_reset_postdata(); ?>
					</div>
				</div>
		    	<div class="col-lg-1">
  				</div>
		    </div>
	  	</div>

	  	<div class="col-lg-5 bg-lightblue testimonial-bg">
	  		<div class="row">
  				<div class="col-lg-1">
  				</div>
  				<div class="col-lg-7">
					<h4><?php the_sub_field('inthenews_overline'); ?></h4>
			    	<h1><?php the_sub_field('inthenews_title'); ?></h1>
			    </div>
			    <div class="col-lg-3 align-self-end" style="text-align:right;">
			        <p>
			        	<?php if( have_rows('inthenews_button') ): ?>
						    <?php while( have_rows('inthenews_button') ): the_row(); ?>
						       <a class="white-border-button" href="<?php the_sub_field('button_url'); ?>"><?php the_sub_field('button_text'); ?></a>
						    <?php endwhile; ?>
						<?php endif; ?>	
			        </p>
			    </div>
  				<div class="col-lg-1">
  				</div>
		    </div>
		    <div class="row">
		    	<div class="col-lg-1">
  				</div>
  				<div class="col-lg-10">

					<?php
					    $args = array('posts_per_page' => 3, 'post_type' => 'inthenews');
						$query = new WP_Query( $args );
						while( $query->have_posts()) : $query->the_post(); ?>
						<div class="inthenews-list mb-4">
							<a href="<?php the_permalink(); ?>">
								<h4 class="green-text"><?php the_field('date'); ?></h4>
								<h3><?php echo get_the_title(); ?></h3>
								<h4 class="read-more-link" style="text-align: right;">Read More  <i class="fa-solid fa-angle-right"></i></h4>
							</a>
						</div>
					<?php endwhile;  wp_reset_postdata(); ?>
				</div>
		    	<div class="col-lg-1">
  				</div>
			</div>
		</div>

	</div>
</div>
