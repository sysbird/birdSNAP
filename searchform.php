<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
    <div><label class="screen-reader-text" for="s">Search for:</label>
        <input type="text" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" id="s" placeholder="<?php _e('Search …', 'birdsnap') ?>">
        <input type="submit" id="searchsubmit" value="&#xf002;">
    </div>
</form>