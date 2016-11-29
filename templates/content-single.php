<div class="ui container">
    <br>
    <br>
    <br>
    <?php while (have_posts()) : the_post(); ?>
        <article <?php post_class(); ?>>
            <header>
                <h1 class="entry-title"><?php the_title(); ?></h1>
                <?php //get_template_part('templates/entry-meta'); ?>
            </header>
            <br><br>
            <div class="entry-content">
                <div class="ui two column grid stackable">
                    <div class="column">
                        <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'full'); ?>
                        <img src="<?= $image[0]; ?>" alt="" class="ui image"/>
                    </div>
                    <div class="column">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <footer>
                <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
            </footer>
            <?php comments_template('/templates/comments.php'); ?>
        </article>
    <?php endwhile; ?>
    <br>
    <br>
</div>
