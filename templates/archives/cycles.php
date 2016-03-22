<?php


$cycle = array('cycle');

$args = array(
    'orderby'           => 'name',
    'order'             => 'ASC',
    'hide_empty'        => true,
);

$cats = get_terms($cycle, $args);

//piklist::pre($cats);
foreach( $cats as $cat ) {
    //echo $cat->name .' '. $cat->term_id . ' '. $cat->slug .'<br>';

    if ($cat->slug === 'cycles-focus') {
        $term_id = $cat->term_id;
        $taxonomy_name = 'cycle';
        $termchildren = get_term_children( $term_id, $taxonomy_name );

        $key = array_search('218',$termchildren);
        $term = get_term_by( 'id', $termchildren[$key], $taxonomy_name );
        echo '<h3>Cycles mensuels</h3>';
        echo '<ul class="archives-links">';
        echo '<li><a href="' . get_term_link( $termchildren[$key], $taxonomy_name ) . '">' . $term->name . '</a></li>';

        $key = array_search('164',$termchildren);
        $term = get_term_by( 'id', $termchildren[$key], $taxonomy_name );

        echo '<li><a href="' . get_term_link( $termchildren[$key], $taxonomy_name ) . '">' . $term->name . '</a></li>';

        $key = array_search('208',$termchildren);
        $term = get_term_by( 'id', $termchildren[$key], $taxonomy_name );

        echo '<li><a href="' . get_term_link( $termchildren[$key], $taxonomy_name ) . '">' . $term->name . '</a></li>';
        echo '</ul>';
        echo '<h3>Cycles ponctuels</h3>';
        echo '<ul class="archives-links">';

        foreach ( $termchildren as $child ) {
            if (!($child == '218')) {
                $term = get_term_by( 'id', $child, $taxonomy_name );
            	echo '<li><a href="' . get_term_link( $child, $taxonomy_name ) . '">' . $term->name . '</a></li>';
            }
        }
        echo '</ul>';
    }
}
