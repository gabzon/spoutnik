<?php
/**
* Template Name: Programme
*/

$theme_options = get_option('my_theme_settings');
$colorpicker = $theme_options['colorpicker'];
?>

asdlkfjasd
aléskdfj



<div class="program-wrapper" style="background: <?php echo $colorpicker; ?>">
    <div class="" style="background:#fefefe">
        <br>
        <br>
        <br>
        <?php get_template_part('templates/program/month'); ?>
        <?php get_template_part('templates/program/week'); ?>
        <br>
        <br>
        <div class="ui grid">
            <div class="one wide column"></div>
            <div class="ten wide column">
                <h1 style="text-transform:uppercase">
                    <?php setlocale(LC_TIME, "fr_FR"); ?>
                    <?php _e('TODAY ','sage'); ?><br>
                    <?php echo  strftime("%A %e %B");   ?>
                </h1>
            </div>
        </div>
        <?php get_template_part('templates/today-films'); ?>
    </div>
</div>
