<div class="ui fluid menu" style="background:transparent" id="top-menu">
    <div class="item" style="color:white;">
        <?php get_template_part('templates/searchform'); ?>
    </div>
    <a href="<?= esc_url(home_url('/')); ?>" id="menu-image">
        <!-- <img src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/images/logo-spoutnik-white-nameless.svg" width="50" style="margin-top:5px;" /> -->
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo-spoutnik-2017.svg" width="50" style="margin-top:5px;" />
    </a>
    <div class="ui item right aligned">
        <a class="menu-btn right aligned" style="color:white; position:relative;text-align:right;cursor: pointer;">MENU <i class="sidebar icon"></i></a>
    </div>
</div>
