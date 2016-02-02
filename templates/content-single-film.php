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
                    <h1 class="entry-title"><?php the_title(); ?></h1>
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
                    <div class="three wide column">
                        <?php $schedule = get_post_meta($post->ID,'film_horaire',true); ?>
                        <?php $website = get_post_meta($post->ID,'film_website',true); ?>
                        <?php
                        for ( $i=0 ; $i < count($schedule['film_date']); $i++) {
                            $movie_date = DateTime::createFromFormat('d/m/Y', $schedule['film_date'][$i])->format('Y-m-d');
                            setlocale(LC_TIME, "fr_FR");
                            $movie_date = new DateTime($movie_date);
                            echo '<h5 class="uppercase no-margin" style="margin:2px">' . utf8_encode(strftime("%a %e %b", $movie_date->getTimestamp())) . ' &nbsp; ' . $schedule['film_heure'][$i] .'</h5>' ;                                                    
                        }
                        ?>
                        <?php $director = get_the_terms($post->ID,'director'); ?>
                        <?php $country = get_the_terms($post->ID,'country'); ?>
                        <?php $language = get_the_terms($post->ID,'language'); ?>
                        <?php $year = get_the_terms($post->ID,'film-year'); ?>
                        <?php $format = get_the_terms($post->ID,'format'); ?>

                        <h5>
                            <?php if ($director): ?>
                                <?php _e('Director: ','sage'); ?>
                                <?php foreach ($director as $x) {
                                    echo $x->name . ' ';
                                } ?>
                                <br>
                            <?php endif; ?>

                            <?php if ($country): ?>
                                <?php _e('Country: ','sage'); ?>
                                <?php foreach ($country as $x) {
                                    echo $x->name . ' ';
                                } ?>
                                <br>
                            <?php endif; ?>
                            <?php if ($year): ?>
                                <?php _e('Year: ','sage'); ?>
                                <?php foreach ($year as $x) {
                                    echo $x->name . ' ';
                                } ?>
                                <br>
                            <?php endif ?>

                            <?php if ($language): ?>
                                <?php _e('Language: ','sage'); ?>
                                <?php foreach ($language as $x) {
                                    echo $x->name . ' ';
                                } ?>
                                <br>
                            <?php endif ?>

                            <?php if ($format): ?>
                                <?php _e('Format: ','sage'); ?>
                                <?php foreach ($format as $x) {
                                    echo $x->name . ' ';
                                } ?>
                                <br>
                            <?php endif ?>

                            <?php if (get_post_meta($post->ID,'film_duration',true)): ?>
                                <?php _e('Duration: ','sage'); ?>
                                <?php echo ' ' . get_post_meta($post->ID,'film_duration',true); ?>
                                <br>
                            <?php endif ?>
                            <?php $actors = get_post_meta($post->ID,'film_actors',true); ?>
                            <?php if ($website): ?>
                                <a href="<?php echo esc_url($website); ?> " target="_blank" class="movie-website">
                                    <?php _e('Website','sage'); ?>
                                </a>
                            <?php endif; ?>
                        </h5>
                    </div>
                    <div class="nine wide column film-content">
                        <?php the_content(); ?>
                    </div>
                    <div class="one wide column">
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
