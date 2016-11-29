<?php

$args = array (
'post_type'              => array( 'film','post' ),
'category_name'          => 'landing-page',
'order'                  => 'ASC',
);

// The Query
$query = new WP_Query( $args );
?>

<?php if ( $query->have_posts() ) :  ?>
    <div id="slides">
        <ul class="slides-container">
            <?php while ( $query->have_posts() ): ?>
                <?php $query->the_post();  ?>
                <li>
                    <?php $feature_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
                    <img src="<?php echo $feature_image; ?>" alt="" class="ui image"/>
                    <div class="container">
                        <h4>
                            <span style="text-transform:uppercase">
                                <a href="<?php echo the_permalink(); ?>" style="color:white; text-shadow: 1px 1px black;">
                                    <?php echo the_title(); ?><br>
                                    <?= get_post_meta($post->ID,'film_landing',true) ?>
                                </a>
                            </span>
                            <br>
                            <?php //echo get_post_meta($post->ID,'film_landing',true) ?>
                        </h4>
                    </div>
                    <div class="ui grid" style="position: absolute; right: 20px; bottom:0px;">
                        <div class="computer tablet only row">
                            <h3 class="ui icon header inverted">
                                <a href="#land" style="color:white;">
                                    <i class="circular chevron down icon"></i>
                                </a>
                            </h3>
                        </div>
                    </div>
                </li>

            <?php endwhile; ?>
        </ul>
    </div>
<?php endif; ?>

<?php wp_reset_postdata(); ?>
