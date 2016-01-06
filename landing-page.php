<?php
/**
* Template Name: Landing Template
*/
$theme_options = get_option('my_theme_settings');
$full_program = $theme_options['spoutnik_programme_complet'];

?>
<br>
<div class="landing-content">
    <div class="gray-shadow">
        <div class="ui stackable grid">
            <div class="one wide column"></div>
            <div class="seven wide column">
                <br>
                <?php setlocale(LC_TIME, "fr_FR"); ?>
                <!-- <h1><?php //echo Date('l jS F Y'); ?></h1> -->
                <h1 style="text-transform:uppercase">
                    <?php _e('TODAY ','sage'); ?><br>
                    <?php echo  utf8_encode(strftime("%A %e %B"));   ?>
                </h1>                 
                <br>
            </div>
        </div>
        <?php get_template_part('templates/today-films'); ?>
        <?php get_template_part('templates/program/week'); ?>
        <div class="ui one column grid">
            <div class="column center aligned">
                <?php //$page = get_page_by_title( 'Programme' ); ?>
                <?php if ($full_program): ?>
                    <a href="<?php echo esc_url( $full_program ); ?>" style="color:black">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/programme_complet.svg" alt="" />
                        <br>
                        <?php _e('full program','sage'); ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
        <br><br>
    </div>
    <br>
    <br>
    <div class="ui grid stackable">
        <div class="one wide column"></div>
        <div class="fifteen wide column">
            <h1 style="text-transform:uppercase"><?php _e('Also at Spoutnik','sage'); ?></h1>
        </div>
    </div>
    <br><br><br>
    <?php
    $the_slug = 'front-page';
    $args = array(
        'name'        => $the_slug,
        'post_type'   => 'page',
        'post_status' => 'publish',
    );
    $my_posts = get_posts($args);
    if( $my_posts ) :
        echo $my_posts[0]->post_content;
    endif;
    ?>
    <br>
    <br>
    <br>
</div>
<br>
