<form role="search" method="get" class="search-form d-flex bg-light rounded shadow" action="<?php echo home_url('/'); ?>">
    <div class="form-group-lg input-group">
        <label>
            <span class="screen-reader-text"><?php echo _x('Search for:', 'label') ?> </span>
            <input type="search" class="search-field form-control form-control-lg bg-light border-0 py-4 rounded-0 rounded-end" placeholder="<?php echo esc_attr_x('ابحثي هنا ...', 'placeholder') ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x('Search for:', 'label') ?>" />
        </label>
    </div>

    <input type="submit" class="btn btn-primary text-light px-5 rounded-0 rounded-start" value="<?php echo esc_attr_x('Search', 'submit button') ?>" />
</form>