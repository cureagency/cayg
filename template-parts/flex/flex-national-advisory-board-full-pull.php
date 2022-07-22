<div class="container <?php the_sub_field('top_margin'); ?>-top-margin <?php the_sub_field('bottom_margin'); ?>-bottom-margin small-topandbottom-padding grayblue-top-border" id="<?php the_sub_field('anchor_link'); ?>">

	<div class="row">

		<?php 
		    query_posts(array( 
		        'post_type' => 'board',
		        'showposts' => -1,
		        'orderby'=>'title',
		        'order'=>'ASC'
		    ) );  
		?>
		<?php while (have_posts()) : the_post(); ?> 
			<div class="col-lg-6">
			   <div class="team-card small-bottom-margin small-topandbottom-padding">
			   		<div class="row align-items-end">
			   			<div class="col-lg-1">
			   			</div>
			   			<div class="col-lg-4">
			   				<?php $thumb = get_the_post_thumbnail_url(); ?>
							<div class="team-card-image background-image" style="background-image: url('<?php echo $thumb;?>')"></div>
			   			</div>
			   			<div class="col-lg-6">
							<h2 id="post-<?php the_ID(); ?>">
								<?php the_title(); ?>
							</h2>
							<p><em><?php the_field('organization'); ?></em></p>
							<?php if( get_field('short_bio') ) { ?>
							    <p class="small mt-4"><?php the_field('short_bio'); ?></p>
							<?php } else { ?>
							   <p class="small mt-4"><?php echo wp_trim_words( get_field('bio'), 40, '...' ); ?></p>

							<?php } ?>
						</div>
			   			<div class="col-lg-1">
			   			</div>
					</div>
					<div class="row align-items-end mt-3">
			   			<div class="col-lg-1">
			   			</div>
			   			<div class="col-lg-4">
			   				<p class="small">
			   					<a class="hyphenate team-card-email" href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a>
			   				</p>
			   			</div>
			   			<div class="col-lg-6">
							<p><a class="green-button-justtext" onclick="bio<?php the_ID(); ?>Trigger()">Read More +</a></p>
						</div>
			   			<div class="col-lg-1">
			   			</div>
					</div>

					<div class="row bio-hide" id="bio-<?php the_ID(); ?>">
						<div class="col-lg-1">
			   			</div>
						<div class="col-lg-10">
							<div class="small mt-4"><?php the_field('bio'); ?></div>
						</div>
						<div class="col-lg-1">
			   			</div>
					</div>

					<script>
						function bio<?php the_ID(); ?>Trigger() {
						  var element = document.getElementById("bio-<?php the_ID(); ?>");
						  element.classList.toggle("bio-show");
						  element.classList.toggle("bio-hide");
						}
					</script>
					
				</div>
			</div>
		<?php endwhile; ?>
	</div>

</div>