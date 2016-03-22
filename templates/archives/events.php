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

    if ($cat->slug === 'evenements') {
        $term_id = $cat->term_id;
        $taxonomy_name = 'cycle';
        $termchildren = get_term_children( $term_id, $taxonomy_name );
        //piklist::pre($termchildren);
        echo '<ul class="archives-links">';
        foreach ( $termchildren as $child ) {
        	$term = get_term_by( 'id', $child, $taxonomy_name );
        	echo '<li><a href="' . get_term_link( $child, $taxonomy_name ) . '">' . $term->name . '</a></li>';
        }
        echo '</ul>';
    }
}
