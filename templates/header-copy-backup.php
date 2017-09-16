<style media="screen">
  #main-menu-front-page{
    border:1px solid red;
  }
</style>

<div class="ui fluid text menu fixed grid" id="main-menu-front-page" style="background:black">
  <div class="mobile only row">
    <div class="item">
      <?php get_template_part('templates/searchform'); ?>
    </div>
    <a href="<?= esc_url(home_url('/')); ?>" id="menu-image">
      <!-- <img src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/images/logo-spoutnik-white-nameless.svg" width="45" style="margin-top:5px;" /> -->
      <!-- <img src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/images/logotype_anime_spoutnik_cinema.gif" width="45" style="margin-top:5px;" /> -->
      <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo-spoutnik-2017.svg" width="100" style="margin-top:5px;" />
    </a>
    <div class="ui item right aligned">
      <a class="menu-mobile-btn right aligned" style="color:white; position:relative;text-align:right;cursor: pointer;">MENU <i class="sidebar icon"></i></a>
    </div>
  </div>
  <div class="tablet only row">
    <div class="item">
      <?php get_template_part('templates/searchform'); ?>
    </div>
    <a href="<?= esc_url(home_url('/')); ?>" id="menu-image">
      <!-- <img src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/images/logotype_anime_spoutnik_cinema.gif" width="45" style="margin-top:5px;" /> -->
      <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo-spoutnik-2017.svg" width="200" style="margin-top:5px;" />
    </a>
    <div class="ui item right aligned">
      <a class="menu-computer-btn right aligned" style="color:white; position:relative;text-align:right;cursor: pointer;">MENU <i class="sidebar icon"></i></a>
    </div>
  </div>
  <div class="computer only row">
    <div class="item">
      <?php get_template_part('templates/searchform'); ?>
    </div>
    <a href="<?= esc_url(home_url('/')); ?>" id="menu-image">
      <!-- <img src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/images/logotype_anime_spoutnik_cinema.gif" width="150" style="margin-top:5px;" /> -->
      <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo-spoutnik-2017.svg" width="200" style="margin-top:5px;" />
    </a>
    <div class="ui item right aligned">
      <a class="menu-computer-btn right aligned" style="color:white; position:relative;text-align:right;cursor: pointer;">MENU <i class="sidebar icon"></i></a>
    </div>
  </div>
</div>


<script type="text/javascript">
$(document).on("scroll", function() {

  if($(document).scrollTop()>100) {
    $("#main-menu-front-page").removeClass("large").addClass("small");
  } else {
    $("#main-menu-front-page").removeClass("small").addClass("large");
  }

});
</script>
