<br>
<br>
<br>
<?php while (have_posts()) : the_post(); ?>
    <article <?php post_class(); ?>>
        <div class="ui container" id="the-movie">
            <div class="ui grid stackable">
                <div class="one wide column">
                </div>
                <div class="fourteen wide column">
                    <h1 class="entry-title" style="margin-bottom:0"><?php the_title(); ?></h1>
                    <?php if (get_post_meta($post->ID,'film_original_title',true)): ?>
                        <h2 style="margin:0;padding:0; color:#A8A8A8"><i><?= get_post_meta($post->ID,'film_original_title',true); ?></i></h2>
                    <?php endif; ?>
                    <br>
                    <?php $feature_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
                    <?php $trailer = get_post_meta($post->ID,'film_trailer',true); ?>
                    <?php if ($trailer): ?>
                        <div class="movie-trailer ui embed" data-source="youtube" data-id="<?php echo $trailer; ?>" data-placeholder="<?php echo $feature_image; ?>"></div>
                    <?php else: ?>
                        <img src="<?php echo $feature_image; ?>" alt="" class="ui image" />
                    <?php endif; ?>

                </div>
                <div class="one wide column">
                </div>
                <div class="ui grid stackable">
                    <div class="one wide column">
                    </div>
                    <div class="four wide column">
                        <?php $schedule = get_post_meta($post->ID,'film_horaire',true); ?>
                        <?php $website = get_post_meta($post->ID,'film_website',true); ?>
                        <?php
                        for ( $i=0 ; $i < count($schedule['film_date']); $i++) {
                            $movie_date = DateTime::createFromFormat('d/m/Y', $schedule['film_date'][$i])->format('Y-m-d');
                            setlocale(LC_TIME, "fr_FR");
                            $movie_date = new DateTime($movie_date);
                            echo '<h5 class="uppercase no-margin" style="margin:2px">' . utf8_encode(strftime("%a %e %b %G", $movie_date->getTimestamp())) . ' &nbsp; ' . $schedule['film_heure'][$i] .'</h5>' ;
                        }
                        ?>
                        <?php $director = get_the_terms($post->ID,'director'); ?>
                        <?php $country = get_the_terms($post->ID,'country'); ?>
                        <?php $language = get_the_terms($post->ID,'language'); ?>
                        <?php $year = get_the_terms($post->ID,'film-year'); ?>
                        <?php $format = get_the_terms($post->ID,'format'); ?>
                        <?php $actors = get_post_meta($post->ID,'film_actors'); ?>
                        <table>
                            <?php if ($director): ?>
                                <tr>
                                    <td valign="top" width="40%"><h5><?php _e('Director','sage'); ?></h5></td>
                                    <td>
                                        <h5>
                                            <?php foreach ($director as $x): ?>
                                                <a class="movie-website" href="<?= get_term_link($x->term_id) ?>"><?= $x->description . '<br>'; ?></a>
                                            <?php endforeach; ?>
                                        </h5>
                                    </td>
                                </tr>
                            <?php endif; ?>
                            <?php if ($country): ?>
                                <tr>
                                    <td valign="top"><h5><?php _e('Country','sage'); ?></h5></td>
                                    <td>
                                        <h5>
                                            <?php foreach ($country as $x) : ?>
                                                <a class="movie-website" href="<?= get_term_link($x->term_id) ?>"><?= $x->name . '<br>'; ?></a>
                                            <?php endforeach; ?>
                                        </h5>
                                    </td>
                                </tr>
                            <?php endif; ?>
                            <?php if ($year): ?>
                                <tr>
                                    <td  valign="top"><h5><?php _e('Year','sage'); ?></h5></td>
                                    <td><h5><?php foreach ($year as $x) {echo $x->name . '<br>';} ?></h5></td>
                                </tr>
                            <?php endif ?>
                            <?php if ($language): ?>
                                <tr>
                                    <td valign="top"><h5><?php _e('Language','sage'); ?></h5></td>
                                    <td><h5><?php foreach ($language as $x) {echo $x->name . '<br>';} ?></h5></td>
                                </tr>
                            <?php endif ?>
                            <?php if ($format): ?>
                                <tr>
                                    <td valign="top"><h5><?php _e('Format','sage'); ?></h5></td>
                                    <td><h5><?php foreach ($format as $x) {echo $x->name . '<br>'; } ?></h5></td>
                                </tr>
                            <?php endif ?>
                            <?php if (get_post_meta($post->ID,'film_duration',true)): ?>
                                <tr>
                                    <td valign="top"><h5><?php _e('Duration','sage'); ?></h5></td>
                                    <td><h5><?php echo ' ' . get_post_meta($post->ID,'film_duration',true); ?></h5></td>
                                </tr>
                                <br>
                            <?php endif ?>
                            <?php if (get_post_meta($post->ID,'film_actors')): ?>
                                <tr>
                                    <tr>
                                        <td valign="top"><h5><?php _e('Actors','sage'); ?></h5></td>
                                        <td><h5><?php foreach ($actors as $x) {echo $x . '<br>'; } ?></h5></td>
                                    </tr>
                                </tr>
                            <?php endif; ?>

                                <tr>
                                    <td valign="top"><h5><?php _e('Cycle','sage'); ?></h5></td>
                                    <td>
                                        <h5 style="color:black;"><?php the_terms( $post->ID, 'cycle', '', '<br>' ); ?></h5>
                                    </td>
                                </tr>

                            <?php if ($website): ?>
                                <tr>
                                    <td colspan="2">
                                        <a href="<?php echo esc_url($website); ?> " target="_blank" class="movie-website">
                                            <?php _e('Website','sage'); ?>
                                        </a>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </table>
                    </div>
                    <div class="nine wide column film-content">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <footer>
        <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
    </footer>
    <?php comments_template('/templates/comments.php'); ?>
</article>
<?php endwhile; ?>

<?php get_template_part('templates/program/week'); ?>
