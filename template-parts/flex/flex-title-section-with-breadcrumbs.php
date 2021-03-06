<div class="container-fluid small-topandbottom-padding bg-navy background-image" 
	<?php 
	$image = get_sub_field('background_image');
	if( !empty( $image ) ): ?> 
		style="background-image:url(' <?php echo esc_url($image['url']); ?> ');"
	<?php endif; ?>
>
	<div class="container">
		<div class="row">
	  		<div class="col-lg-6">
		    	<h1 class="white-text"><?php the_sub_field('page_title'); ?></h1>
		  	</div>
			<div class="col-lg-6">
			</div>
		</div>
		<div class="row mt-3">
	  		<div class="col-lg-6">
		    	<p class="white-text">
		    		<?php global $post;
				  if ( $post->post_parent ) { ?>
				    <a class="nobg-nop-button" href="<?php echo get_permalink( $post->post_parent ); ?>" >
				    	<?php echo get_the_title( $post->post_parent ); ?>
				    </a>
					<?php } ?>
				</p>
		  	</div>
			<div class="col-lg-6">
			</div>
		</div>
	</div>
</div>