<div class="container <?php the_sub_field('top_margin'); ?>-top-margin <?php the_sub_field('bottom_margin'); ?>-bottom-margin" id="<?php the_sub_field('anchor_link'); ?>">

	<div class="row">
		<div class="col">
			<p>sort and search to go here</p>
		</div>
	</div>

	<div class="row">
		<?php 
		$loop = new WP_Query( array( 'post_type' => 'board', 'posts_per_page' => -1 ) ); 
		while ( $loop->have_posts() ) : $loop->the_post();
		?>
			<div class="col-lg-6">
			   <div class="team-card">
					<h2 id="post-<?php the_ID(); ?>">
					<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
					<?php the_title(); ?></a></h2>
					<small><?php the_time('F jS, Y') ?> <!-- by <?php the_author() ?> --></small>
				</div>
			</div>
		<?php endwhile; ?>
	</div>

</div>