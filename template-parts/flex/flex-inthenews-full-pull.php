<div class="container <?php the_sub_field('top_margin'); ?>-top-margin <?php the_sub_field('bottom_margin'); ?>-bottom-margin small-topandbottom-padding" id="<?php the_sub_field('anchor_link'); ?>">


            <?php
            if ( get_query_var('paged') ) {
                $paged = get_query_var('paged');
            } elseif ( get_query_var('page') ) { // 'page' is used instead of 'paged' on Static Front Page
                $paged = get_query_var('page');
            } else {
                $paged = 1;
            }

            $custom_query_args = array(
                'post_type' => 'inthenews', 
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

            <div class="row row-eq-height">

               <?php while( $custom_query->have_posts() ) : $custom_query->the_post(); ?>

                    <div class="col-lg-4">
                        <div class="team-card small-bottom-margin small-topbottomleftright-padding">
                            <div class="row">
                                <div class="col-1">
                                </div>
                                <div class="col-10">
                                    <article <?php post_class(); ?>>
                                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                        <div><?php echo wp_trim_words(get_the_content(), 60) ?></div>
                                        <a class="green-button-justtext" href="<?php the_permalink(); ?>">Read More</a>
                                    </article>
                                </div>
                                <div class="col-1">
                                </div>
                            </div>
                        </div>
                    </div>

                <?php
                endwhile;
                ?>

            </div>
            <div class="row">

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