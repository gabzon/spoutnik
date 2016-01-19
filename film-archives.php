<?php
/**
* Template Name: Films Categories
*/
?>
<?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('templates/page', 'header'); ?>
    <?php get_template_part('templates/content', 'page'); ?>
    <?php echo get_the_category_list(); ?>
<?php endwhile; ?>


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
    <div id="archive-tab" class="ui top attached tabular menu">
        <a class="active item" data-tab="first"><?php _e('Directors','sage'); ?></a>
        <a class="item" data-tab="second"><?php _e('Cycles','sage'); ?></a>
        <a class="item" data-tab="third"><?php _e('Collaborations','sage'); ?></a>
        <a class="item" data-tab="four"><?php _e('Events','sage'); ?></a>
        <a class="item" data-tab="fifth"><?php _e('Chronologic','sage'); ?></a>
    </div>
    <div class="ui bottom attached active tab segment" data-tab="first">

    </div>
    <div class="ui bottom attached tab segment" data-tab="second">
        Second
    </div>
    <div class="ui bottom attached tab segment" data-tab="third">
        Third
    </div>
    <div class="">
        <h2><?php _e('Directors','sage'); ?></h2>
        <?php get_template_part('templates/archives/directors'); ?>
    </div>
    <br>
    <div class="ui divider"></div>
    <h2><?php _e('Cycles','sage'); ?></h2>
    <?php nestedCategories($cycles); ?>
</div>
<br>
