<?php

function gymfitness_classes_list()
{ ?>
    <ul class="classes-list">
        <?php

        $args = array(
            'post_type' => 'gymfitness_clases',

        );
        //Use WP_Query and Append the Results qinto $classes
        $classes = new WP_Query($args);

        while ($classes->have_posts()) : $classes->the_post();
        ?>
            <li class="gym-class card gradient">

                <?php

                the_post_thumbnail('mediumSize');
                ?>

                <div class="card-content">

                    <a href="<?php the_permalink(); ?>">

                        <h3> <?php the_title(); ?></h3>
                    </a>
                    <?php $start_time = get_field('start_time');
                    $end_time = get_field('end_time');?>

                    <p <?php the_field('class_days') ?>><?php echo $start_time . ' to ' . $end_time ?></p>
                </div>

            </li>


        <?php
        //Reset post Data es para decir a Word Press que ya se termino de usar WP_Query
        endwhile;
        wp_reset_postdata(); ?>
    </ul>
<?php
}
