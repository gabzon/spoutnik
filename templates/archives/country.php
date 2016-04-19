<?php

$cycle = array('country');

$args = array(
    'orderby'           => 'name',
    'order'             => 'ASC',
    'hide_empty'        => true,
);

$cats = get_terms($cycle, $args);

foreach( $cats as $cat ) {
    ?>
    <a href="<?= get_term_link($cat->term_id); ?>" class="ui button basic" style="margin-top:10px;font-family:'Suisse Intl','sans-serif';"><?= $cat->name; ?> (<?= $cat->count; ?>)</a>
    <?php
}
