<form role="search" method="get" action="<?= esc_url(home_url('/')); ?>">
    <div class="ui transparent left icon input" style="color:white; font-size:1.8rem; margin-top:-5px;">
        <input type="text" placeholder="" value="<?= get_search_query(); ?>" name="s" style="color:white;">
        <i class="search icon"></i>
    </div>
</form>
