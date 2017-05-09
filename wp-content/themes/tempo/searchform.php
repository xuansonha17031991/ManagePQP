<form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" class="tempo-search-form">
    <fieldset>
        <div id="searchbox">
            <input type="text" name="s"  id="keywords" value="<?php echo esc_attr( get_search_query() ); ?>" placeholder="<?php _e( 'Type here...', 'tempo' ); ?>">
            <button type="submit" class="btn-search"><i class="tempo-icon-search-5"></i></button>
        </div>
    </fieldset>
</form>
