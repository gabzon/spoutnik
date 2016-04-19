<?php
/**
* Template Name: Films Categories
*/
?>


<?php
/*----------------------------------------------------------------------------*/
$director = array('director');
$cycle = array('cycle');

$parent_args = array(
    'orderby'           => 'name',
    'order'             => 'ASC',
    'hide_empty'        => true,
);

$directors = get_terms($director, $parent_args);
$cycles = get_terms($cycle, $parent_args);

function nestedCategories($cat){
    if (count($cat) > 0) {
        foreach ($cat as $c){
            $link = get_term_link( $c );
            echo '<a class="ui basic button" href="' . $link . '" style="font-weight:bold;margin-top: 5px;">';
            echo $c->name;
            $taxonomy_name = $c->taxonomy;
            echo $c->term_id;
            echo '</a>';
            $parent_id = $c->term_id;
            $subcategories = get_terms ( 'taxonomy_name', array ( 'child_of' => $parent_id, 'hide_empty' => false, 'orderby' => 'name', 'order' => 'ASC', ) );
            //then set the args for wp_list_categories
            $termchildren = get_term_children( $c->term_id, $taxonomy_name );
            if ($termchildren) {
                echo '<br>';
                foreach ( $termchildren as $child ) {
                    $term = get_term_by( 'id', $child, $taxonomy_name );
                    echo '<a href="' . get_term_link( $child, $taxonomy_name ) . '" class="ui basic button" style="margin-top: 5px;">' . $term->name . '</a>';
                }
            }
        }
    }
}

?>

<div class="ui container">
    <?php while (have_posts()) : the_post(); ?>
        <?php get_template_part('templates/page', 'header'); ?>
        <?php get_template_part('templates/content', 'page'); ?>
        <?php echo get_the_category_list(); ?>
    <?php endwhile; ?>
    <div id="archive-tab" class="ui pointing secondary menu">
        <a class="item active" data-tab="cycle"><h4 style="text-transform: uppercase"><?php _e('Cycles','sage'); ?></h4></a>
        <a class="item" data-tab="event"><h4 style="text-transform: uppercase"><?php _e('Events','sage'); ?></h4></a>
        <a class="item" data-tab="collaboration"><h4 style="text-transform: uppercase"><?php _e('Collaborations','sage'); ?></h4></a>
        <a class="item" data-tab="director"><h4 style="text-transform: uppercase"><?php _e('Directors','sage'); ?></h4></a>
        <a class="item" data-tab="country"><h4 style="text-transform: uppercase"><?php _e('Pays','sage'); ?></h4></a>
        <a class="item" data-tab="month"><h4 style="text-transform: uppercase"><?php _e('Monthly','sage'); ?></h4></a>
    </div>
    <div class="ui bottom attached active tab" data-tab="cycle">
        <?php get_template_part('templates/archives/cycles'); ?>
    </div>
    <div class="ui bottom attached tab" data-tab="event">
        <?php get_template_part('templates/archives/events'); ?>
    </div>
    <div class="ui bottom attached tab" data-tab="collaboration">
        <?php get_template_part('templates/archives/collaborations'); ?>
    </div>
    <div class="ui bottom attached tab" data-tab="director">
        <?php get_template_part('templates/archives/directors'); ?>
    </div>
    <div class="ui bottom attached tab" data-tab="country">
        <?php get_template_part('templates/archives/country'); ?>
    </div>
    <div class="ui bottom attached tab" data-tab="month">
        <?php get_template_part('templates/archives/monthly'); ?>
    </div>
</div>
<br>
