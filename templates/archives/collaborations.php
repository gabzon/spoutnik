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

    if ($cat->slug === 'collaboration-lieux-culturels') {
        $term_id = $cat->term_id;
        $taxonomy_name = 'cycle';
        $termchildren = get_term_children( $term_id, $taxonomy_name );
        echo '<h3>Lieux culturels</h3>';
        display_order_alphabeticaly($termchildren, 'cycle');
    }

    if ($cat->slug === 'collaboration-festival') {
        $term_id = $cat->term_id;
        $taxonomy_name = 'cycle';
        $termchildren = get_term_children( $term_id, $taxonomy_name );
        echo '<h3>Festivals / Événements</h3>';
        display_order_alphabeticaly($termchildren, 'cycle');
    }

    if ($cat->slug === 'collaboration-institutions') {
        $term_id = $cat->term_id;
        $taxonomy_name = 'cycle';
        $termchildren = get_term_children( $term_id, $taxonomy_name );
        echo '<h3>Institutions</h3>';
        display_order_alphabeticaly($termchildren, 'cycle');
    }

    if ($cat->slug === 'collaboration-associations') {
        $term_id = $cat->term_id;
        $taxonomy_name = 'cycle';
        $termchildren = get_term_children( $term_id, $taxonomy_name );
        echo '<h3>Associations / Collectifs</h3>';
        display_order_alphabeticaly($termchildren, 'cycle');
    }
}

$category = get_term_by('id', 'collaborations','cycle');
