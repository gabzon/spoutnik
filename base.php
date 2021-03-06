<?php
use Roots\Sage\Config;
use Roots\Sage\Wrapper;
?>

<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>
    <!--[if lt IE 9]>
    <div class="alert alert-warning">
    <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
</div>
<![endif]-->
<?php
do_action('get_header');
$theme_options = get_option('my_theme_settings');
$colorpicker = $theme_options['colorpicker'];
?>
<?php get_template_part('templates/sidebar-menu'); ?>
<div class="pusher">
    <div class="wrap container" role="document">
        <div class="content row">
            <?php get_template_part('templates/header'); ?>
            <main class="main-wrapper" role="main" style="background:<?php echo $colorpicker;  ?>">
                <div class="gray-shadow">
                    <?php include Wrapper\template_path(); ?>
                </div>
            </main><!-- /.main -->
        </div><!-- /.content -->
    </div><!-- /.wrap -->
</div>
<?php
do_action('get_footer');
get_template_part('templates/footer');
wp_footer();
?>
</body>
</html>
