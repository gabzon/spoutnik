<?php get_template_part('templates/page', 'header'); ?>

<?php if (!have_posts()) : ?>
    <div class="alert alert-warning">
        <?php _e('Sorry, no results were found.', 'sage'); ?>
    </div>
    <?php get_search_form(); ?>
<?php endif; ?>

<div class="ui container">

    <?php $image_cycle = get_term_meta(get_queried_object()->term_id, 'program_image', false); ?>
    <h1><?= get_queried_object()->description ?></h1>
    <div class="ui grid stackable">
        <div class="one wide column"></div>
        <div class="seven wide column">
            <img src="<?= $image_cycle[0]; ?>" alt="" class="ui image" />
            <br>
            <?php if ( get_term_meta(get_queried_object()->term_id, 'program_pdf', false) ): ?>
                <?php $pdf = get_term_meta(get_queried_object()->term_id, 'program_pdf', false); ?>
                <a href="<?= esc_url($pdf[0]); ?>" class="ui button">
                    <?php _e('Télécharger le programme','sage'); ?>
                </a>
            <?php endif; ?>
        </div>
        <div class="seven wide column">
            <?php echo get_term_meta(get_queried_object()->term_id, 'program_text', true); ?>
        </div>
        <div class="one wide column"></div>
    </div>
</div>
<br>
<br>
<br>
<div class="ui container">
    <div class="ui four column grid stackable">
        <?php while (have_posts()) : the_post(); ?>
            <?php get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
        <?php endwhile; ?>
    </div>
    <?php the_posts_navigation(); ?>
    <br>
</div>
<br>
