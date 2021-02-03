
<form role="search" method="get" class="search-form wpcf7" action="<?php echo home_url( '/' ); ?>">
  <div class="cf7-form-fields">
    <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Type to search', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
    <input type="submit" class="search-submit btn" value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" />
  </div>
</form>