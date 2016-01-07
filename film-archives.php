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

<?php $categories = get_terms(); ?>

<?php the_taxonomies( 'before=<ul>&after=</ul>' ); ?>

<?php
$taxonomies = get_taxonomies();
foreach ( $taxonomies as $taxonomy ) {
    echo '<p>' . $taxonomy . '</p>';
}
?>

<?php
/*----------------------------------------------------------------------------*/
$director = array('director');
$cycle = array('cycle');

$parent_args = array(
    'orderby'           => 'name',
    'order'             => 'ASC',
    'hide_empty'        => true,
    'parent'            => 0,
);
$children_args = array(
    'orderby'           => 'name',
    'order'             => 'ASC',
    //'hide_empty'        => true,
    'parent'            => 1,
);

$directors = get_terms($director, $parent_args);
$cycles = get_terms($cycle, $children_args);
?>
<?php
function nestedCategories($cat){
    if (count($cat) > 0) {
        foreach ($cat as $c){
            $link = get_term_link( $c );
            echo '<a class="ui basic button" href="$link" style="font-weight:bold;">';
            echo  $c->name;
            echo '</a>';
            $parent_id = $c->term_id;
            $subcategories = get_terms ( 'taxonomy_name', array ( 'child_of' => $parent_id, 'hide_empty' => false, 'orderby' => 'name', 'order' => 'ASC', ) );
    }
}
}

?>
<div class="ui container">
    <div class="">
        <h2><?php _e('Directors','sage'); ?></h2>
        <?php nestedCategories($directors); ?>
    </div>
    <br>
    <div class="ui divider"></div>
    <h2><?php _e('Cycles','sage'); ?></h2>
    <?php foreach ($cycles as $city): ?>
        <?php $city_link = get_term_link( $city ); ?>
        <a class="ui basic button" href="<?php echo $city_link; ?>" style="font-weight:bold;">
            <?php echo $city->name; ?>
        </a>
    <?php endforeach; ?>
</div>
<br>
