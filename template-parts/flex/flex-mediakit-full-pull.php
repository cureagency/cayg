<div class="bg-lightblue">
    <div class="container <?php the_sub_field('top_margin'); ?>-top-margin <?php the_sub_field('bottom_margin'); ?>-bottom-margin large-topandbottom-padding" id="<?php the_sub_field('anchor_link'); ?>">


                <?php
                if ( get_query_var('paged') ) {
                    $paged = get_query_var('paged');
                } elseif ( get_query_var('page') ) { // 'page' is used instead of 'paged' on Static Front Page
                    $paged = get_query_var('page');
                } else {
                    $paged = 1;
                }

                $custom_query_args = array(
                    'post_type' => 'mediakit', 
                    'posts_per_page' => 20,
                    'paged' => $paged,
                    'post_status' => 'publish',
                    'ignore_sticky_posts' => true,
                    //'category_name' => 'custom-cat',
                    'order' => 'DESC', // 'ASC'
                    'orderby' => 'date' // modified | title | name | ID | rand
                );
                $custom_query = new WP_Query( $custom_query_args );

                if ( $custom_query->have_posts() ) : ?>


                   <?php while( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
                    <div class="row">
                        <div class="col-lg-1">
                        </div>
                        <div class="col-lg-10">
                                <div class="inthenews-list mb-4">
                                    <a href="<?php the_permalink(); ?>">
                                        <h4 class="green-text"><?php the_field('date'); ?></h4>
                                        <h3><?php echo get_the_title(); ?></h3>
                                        <h4 class="read-more-link" style="text-align: right;">Read More  <i class="fa-solid fa-angle-right"></i></h4>
                                    </a>
                                </div>
                        </div>
                        <div class="col-lg-1">
                        </div>

                    </div>
                    <?php
                    endwhile;
                    ?>

                <div class="row">

                     <div class="col-lg">

                        <?php if ($custom_query->max_num_pages > 1) : // custom pagination  ?>
                            <?php
                            $orig_query = $wp_query; // fix for pagination to work
                            $wp_query = $custom_query;
                            ?>
                            <nav class="prev-next-posts">
                                <div class="prev-posts-link">
                                    <?php echo get_next_posts_link( 'Older Entries', $custom_query->max_num_pages ); ?>
                                </div>
                                <div class="next-posts-link">
                                    <?php echo get_previous_posts_link( 'Newer Entries' ); ?>
                                </div>
                            </nav>
                            <?php
                            $wp_query = $orig_query; // fix for pagination to work
                            ?>
                        <?php endif; ?>

                    <?php
                        wp_reset_postdata(); // reset the query 
                    else:
                        echo '<p>'.__('Sorry, no posts matched your criteria.').'</p>';
                    endif;
                    ?>
                </div>

        </div>
    </div>
</div>