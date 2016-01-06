
<?php
$args = array (
'post_type'=> array( 'film' ),
'posts_per_page' => -1,
'post_status' => 'publish'
);

// The Query
$query = new WP_Query( $args );

$current_year = date('Y');
$current_month = date('m');
$current_date = new DateTime();
$current_week = $current_date->format("W");

$date_now = $current_date->format('Y-m-d');
$date_next_14_days = new DateTime("now");
$date_next_14_days->modify('+20 day');
$date_film_soon = $date_next_14_days->format('Y-m-d');

//echo '14d:' . $date_film_soon . '<br>';

$films_week = array();
// if ( $query->have_posts() ) {
//     while ( $query->have_posts() ) {
//         $query->the_post();
//         $horaire = get_post_meta($post->ID,'film_horaire',true);
//         $feature_image = wp_get_attachment_url( get_post_thumbnail_id($film['id']) );
//         $movie_title = $post->post_title;
//         for ( $i = 0 ; $i < count($horaire['film_date']) ; $i++ ) {
//             $movie_projection_date = $horaire['film_date'][$i];
//             $movie_date_reformatted = DateTime::createFromFormat('d/m/Y', $movie_projection_date)->format('Y-m-d');
//             $movie_date = new DateTime($movie_date_reformatted);
//             $movie_projection_year = $movie_date->format("Y");
//             $movie_projection_month = $movie_date->format("m");
//             $movie_projection_week = $movie_date->format("W");
//             if ( $movie_projection_year == $current_year ) {
//                 if ($movie_projection_month == $current_month) {
//                     if ($movie_projection_week == $current_week) {
//                         $film_detail = array(
//                             'id'    => $post->ID,
//                             'image' => $feature_image,
//                             'title' => $movie_title,
//                             'date'  => $movie_date_reformatted,
//                             'hour'  => $horaire['film_heure'][$i]
//                         );
//                         array_push($films_week, $film_detail);
//                     }
//                 }
//             }
//         }
//     }
// }

if ( $query->have_posts() ) {
    while ( $query->have_posts() ) {
        $query->the_post();
        $horaire = get_post_meta($post->ID,'film_horaire',true);
        $feature_image = wp_get_attachment_url( get_post_thumbnail_id());
        $movie_title = $post->post_title;

        if ($horaire) {
            for ( $i = 0 ; $i < count($horaire['film_date']) ; $i++ ) {
                $movie_projection_date = $horaire['film_date'][$i];
                $movie_date_reformatted = DateTime::createFromFormat('d/m/Y', $movie_projection_date)->format('Y-m-d');
                //$movie_date = new DateTime($movie_date_reformatted);
                //$movie_projection_year = $movie_date->format("Y");
                //$movie_projection_month = $movie_date->format("m");
                //$movie_projection_week = $movie_date->format("W");
                if (($movie_date_reformatted >= $date_now)&($movie_date_reformatted <= $date_film_soon)) {
                    $film_detail = array(
                        'id'    => $post->ID,
                        'image' => $feature_image,
                        'title' => $movie_title,
                        'date'  => $movie_date_reformatted,
                        'hour'  => $horaire['film_heure'][$i]
                    );
                    array_push($films_week, $film_detail);
                }
            }
        }

        $last_projection = DateTime::createFromFormat('d/m/Y', end($horaire['film_date']))->format('Y-m-d');
        if ($last_projection < $date_now) {
            $wpdb->update( $wpdb->posts, array( 'post_status' => 'inactive' ), array( 'ID' => $post->ID ) );
            clean_post_cache( $post->ID );
            $old_status = $post->post_status;
            $post->post_status = 'inactive';
            wp_transition_post_status( 'inactive', $old_status, $post );
        }
    }
}

wp_reset_postdata();

$date = array();
$hour = array();
foreach ($films_week as $key => $row) {
    $date[$key]  = $row['date'];
    $hour[$key] = $row['hour'];
}
array_multisort($date, SORT_ASC, $hour, SORT_ASC, $films_week);
?>

<section id="week-program" class="program" style="background:#eee">
    <div class="ui container">
        <div class="ui grid">
            <div class="sixteen wide column">
                <h1><?php _e('Next 20 days','sage'); ?></h1>
                <?php //echo 'Today: ' . $date_now . '<br>' ?>
                <?php //echo 'Next 14d: ' . $date_film_soon .'<br>' ?>
            </div>
        </div>
        <div class="ui three column grid stackable">
            <?php if ($films_week): ?>
                <?php foreach ($films_week as $film): ?>
                    <div class="column">
                        <div class="img-container">
                            <a href="<?php echo esc_url( get_permalink( $film['id'] ) ); ?>">
                                <img src="<?php echo $film['image']; ?>" alt="" class="ui image film-image" />
                            </a>
                            <h3 class="film-title"><?php echo $film['title']; ?></h3>
                        </div>
                        <?php setlocale(LC_TIME, "fr_FR"); ?>
                        <?php $movie_date = new DateTime($film['date']);  ?>
                        <h3 class="film-week-detail">
                            <?php echo utf8_encode(strftime("%a %e %b", $movie_date->getTimestamp())) . ', ' . $film['hour'] ; ?>

                        </h3>
                        <?php $director = get_the_terms($film['id'],'director'); ?>
                        <?php $country = get_the_terms($film['id'],'country'); ?>
                        <?php $language = get_the_terms($film['id'],'language'); ?>
                        <?php $year = get_the_terms($film['id'],'film-year'); ?>
                        <?php $format = get_the_terms($film['id'],'format'); ?>
                        <h5>
                            <!-- <?php if ($director): ?>
                                <?php foreach ($director as $x) {
                                    echo $x->name . ' ';
                                } ?>
                                <br>
                            <?php endif; ?>

                            <?php if ($country): ?>
                                <?php foreach ($country as $x) {
                                    echo $x->name . ' ';
                                } ?><br>
                            <?php endif; ?>

                            <?php if ($year): ?>
                                <?php foreach ($year as $x) {
                                    echo $x->name . ' ';
                                } ?><br>
                            <?php endif ?>

                            <?php if ($language): ?>
                                <?php foreach ($language as $x) {
                                    echo $x->name . ' ';
                                } ?><br>
                            <?php endif ?>

                            <?php if ($format): ?>
                                <?php foreach ($format as $x) {
                                    echo $x->name . ' ';
                                } ?>
                            <?php endif ?>
                            <br>
                            <?php if (condition): ?>
                                <?php echo ' ' . get_post_meta($post->ID,'film_duration',true); ?>
                            <?php endif ?> -->
                        </h5>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <br>&nbsp;
    </div>
</section>
