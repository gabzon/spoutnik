<form role="search" method="get" action="<?= esc_url(home_url('/')); ?>">
    <div class="ui transparent left icon input" style="color:white;">
        <input type="text" placeholder="<?php _e('Search', 'sage'); ?>" value="<?= get_search_query(); ?>" name="s" style="color:white;">
        <i class="search icon"></i>
    </div>
</form>
