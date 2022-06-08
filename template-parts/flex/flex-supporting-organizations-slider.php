<div class="container-fluid pt-5 pb-5">
	<div class="row">
  		<div class="col-lg-12">
	    	<h1 class="mb-2" style="text-align: center;"><?php the_sub_field('title'); ?></h1>
	  	</div>
	</div>

	<div class="row pt-3" style="padding-left: 0; padding-right: 0;">
  		<div class="col-lg-12" style="padding-left: 0; padding-right: 0;">
		    <?php if( have_rows('organizations') ): ?>
		    	<div class="organization-slider">
					<?php while( have_rows('organizations') ): the_row(); ?>
						<div class="organization-slide" style="display: block; position: relative;">
							<a href="<?php the_sub_field('link'); ?>">
								<?php if( get_sub_field('logo') ): ?>
								    <img src="<?php the_sub_field('logo'); ?>" />
								<?php endif; ?>
							</a>
						</div>
				    <?php endwhile; ?>
				</div>
			<?php endif; ?>	
	  	</div>
	</div>

</div>

<script>
	jQuery(function($){
		$('.organization-slider').slick({
		  slidesToShow: 5,
		  slidesToScroll: 1,
		  autoplay: true,
		  centerPadding: '90px',
		  centerMode: true,
		  arrows: false,
		  autoplaySpeed: 2000,
		});
	});
</script>
