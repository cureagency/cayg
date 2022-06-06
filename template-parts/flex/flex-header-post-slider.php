<header class="entry-header background-icon div-wrapper" style=" background-image: url( <?php echo get_template_directory_uri(); ?>/inc/images/CAYG-logomark-gradientoutline.png );">
		

	<div class="container first-div">
		<div class="row">
			<div class="col">
				<div class="slider-wrap">
			  		<?php
					    $args = array(
					        'post_type' => 'post',
					        'order'          => 'ASC',
							'posts_per_page' => '5'

					    );

					    $post_query = new WP_Query($args);

					    if($post_query->have_posts() ) { ?>
				    			<div class="slider-nav">
							       <?php while($post_query->have_posts() ) {
							            $post_query->the_post();
							            ?>
							            <div class="nav-slide-wrap">
								            <div class="nav-slide">
								            	<p><?php the_title(); ?></p>
								            </div>
								        </div>
							          	<?php
							            }
							        ?>
							    </div>
			            <?php
			            }
			        ?>
			      </div>
		     </div>
		</div>
	</div>

	<div class="container second-div">
		<div class="row">

    		<div class="col-lg-6" style="color: white;">
    			<div class="content-card-left">
					<p>
					For too many learners, the only postsecondary credentials that count are four tiers of degrees (associate, bachelor’s, master’s, doctorate). Degrees are widely recognized and often required to be considered for employment. This singular focus on degrees punishes those who attend college but do not complete a traditional degree, often treating them as if they have no postsecondary-level learning. <br>&nbsp;<br>

					The impacts are far-reaching and serious for all but America’s most entitled populations. Credentialing is an equity issue. The differentials of employment and income between those who do/don’t have a college degree are blatant. The Covid-19 pandemic has increased the disparities, with millions needing to upskill and reskill to remain or become re-employed. <br>&nbsp;<br>

					Many are calling for the U.S. to embrace the growing array of shorter-term credentials and integrate them with degrees. Credentialing seals learning into qualifications that are recognizable, transferable, and usable to gain and sustain employment and continue education. Without formally recognized credentials, the system treats individuals as if they have no knowledge and skills, even if they have acquired equivalent learning through work and life experiences or previous college coursework. We need a postsecondary system that captures uncounted learning and validates that learning to enable individuals to be recognized for what they know and can do. We need credential as you go system. <br>&nbsp;<br>

					This issue is not only an American issue; many other nations are embarked in similar efforts to incentivize and recognize microcredentials alongside degrees.</p>
				</div>
			</div>

    		<div class="col-lg-6">
    			<div class="slider-for-wrap">
					<?php
				    $args = array(
				        'post_type' => 'post',
				        'order'          => 'ASC',
						'posts_per_page' => '5'
				    );

				    $post_query = new WP_Query($args);

				    if($post_query->have_posts() ) { ?>
		    			<div class="slider-for">
					       <?php while($post_query->have_posts() ) {
					            $post_query->the_post();
					            ?>
			            			<div class="content-card">
				            			<h1><?php the_title(); ?></h1>
				            			
				            			<div class="green-line">
				            			</div>

					            			<p><?php
												$excerpt = get_the_excerpt();
												 
												$excerpt = substr($excerpt, 0, 500);
												$result = substr($excerpt, 0, strrpos($excerpt, ' '));
												echo $result;
												?>...	
											</p>
											<a class="cta-box-button" target="_blank" href="<?php echo get_permalink(); ?>">Learn More</a>
										
				            		</div>
							        <?php
						            }
						        ?>
							</div>
			            <?php
			            }
				    ?>
				</div>
    		</div>

		</div>
	</div>

		<script>
				jQuery(function($){
					$('.slider-for').slick({
					  slidesToShow: 1,
					  slidesToScroll: 1,
					  centerMode: true,
					  dots: false,
					  arrows: false,
					  fade: true,
					  asNavFor: '.slider-nav'
					});
					$('.slider-nav').slick({
					  slidesToShow: 4,
					  autoplay: true,
					  autoplaySpeed: 6000,
					  slidesToScroll: 1,
					  asNavFor: '.slider-for',
					  dots: false,
					  arrows: true,
					  centerMode: false,
					  focusOnSelect: true,
					  infinite: true,
					  responsive: [
					    {
					      breakpoint: 1024,
					      settings: {
					        slidesToShow: 3,
					      }
					    },
					     {
					      breakpoint: 800,
					      settings: {
					        slidesToShow: 2,
					      }
					    }
					   ]
					});
				});
			</script>
		<?php wp_reset_postdata(); ?>
</header><!-- .entry-header -->