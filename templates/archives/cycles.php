<?php


$cycle = array('cycle');

$args = array(
    'orderby'           => 'name',
    'order'             => 'ASC',
    'hide_empty'        => true,
);

$cats = get_terms($cycle, $args);

foreach( $cats as $cat ) {
    //echo $cat->name .' '. $cat->term_id . ' '. $cat->slug .'<br>';
    if ($cat->slug === 'cycles-reguliers') {
        $term_id = $cat->term_id;
        $taxonomy_name = 'cycle';
        $termchildren = get_term_children( $term_id, $taxonomy_name );
        echo '<h3>Cycles réguliers</h3>';
        echo '<ul class="archives-links">';
        foreach ( $termchildren as $child ) {
            //if (!($child == '218')) {
                $term = get_term_by( 'id', $child, $taxonomy_name );
                echo '<li><a href="' . get_term_link( $child, $taxonomy_name ) . '">' . $term->name . '</a></li>';
            //}
        }
        echo '</ul>';
    }

    if ($cat->slug === 'cycles-focus') {
        $term_id = $cat->term_id;
        $taxonomy_name = 'cycle';
        $termchildren = get_term_children( $term_id, $taxonomy_name );

        echo '<h3>Cycles ponctuels</h3>';
        echo '<ul class="archives-links">';
        foreach ( $termchildren as $child ) {
            //if (!($child == '218')) {
                $term = get_term_by( 'id', $child, $taxonomy_name );
            	echo '<li><a href="' . get_term_link( $child, $taxonomy_name ) . '">' . $term->name . '</a></li>';
            //}
        }
        echo '</ul>';
    }


}
