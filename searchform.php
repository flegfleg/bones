<h4 class="widgettitle"><?php _e('Search','bonestheme'); ?></h4>
<form role="search" method="get" id="searchform" class="searchform" action="<?php echo home_url( '/' ); ?>">
    <div>
        <label for="s" class="screen-reader-text"><?php _e('Search for:','bonestheme'); ?></label>
        <input type="search" id="s" name="s" value="" />

        <button type="submit" id="searchsubmit" class="submit"><?php _e('Search','bonestheme'); ?></button>
    </div>
</form>