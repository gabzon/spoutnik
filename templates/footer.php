<?php

$theme_options = get_option('my_theme_settings');
$normal = $theme_options['tarif_normale'];
$reduit = $theme_options['tarif_reduit'];
$enfant = $theme_options['tarif_enfant'];
$membre = $theme_options['tarif_membre'];
$membre_annee = $theme_options['tarif_membre_annee'];
$fb = $theme_options['spoutnik_facebook'];
$email = $theme_options['spoutnik_email'];
$phone = $theme_options['spoutnik_phone'];
$cinema_address = $theme_options['spoutnik_address_cinema'];
?>

<footer class="ui vertical black inverted segment">
    <br>
    <div class="ui container">
        <div class="ui four column grid stackable">
            <div class="column sidebar-footer">
                <?php dynamic_sidebar('sidebar-footer'); ?>
            </div>
            <div class="column">
                <h3><?php _e('CONTACT','sage') ?></h3>
                <h5>
                    <?php echo $cinema_address; ?><br>
                    <?php echo $phone; ?><br>
                    <?php echo $email; ?>
                </h5>
            </div>
            <div class="five wide column">
                <h3>TARIFS</h3>
                <h5>
                    normal: <?php echo $normal; ?> <br>
                    réduit : <?php echo $reduit; ?><br>
                    enfant	: <?php echo $enfant; ?><br>
                    membre:	<?php echo $membre . ' ('. $membre_annee .')'; ?>
                </h5>
            </div>
            <div class="three wide column left aligned">
                <a href="<?php echo esc_url($fb) ?>" target="_blank" class="facebook-icon"><h2><i class="facebook icon"></i></h2></a>
            </div>
        </div>
    </div>
    <br><br><br>
</footer>
