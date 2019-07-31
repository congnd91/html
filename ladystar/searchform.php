<?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<form role="search" method="get" class="search-wr" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <input type="search" required="required" class="input" id="<?php echo esc_html($unique_id); ?>" name="s" placeholder="<?php esc_html_e('Enter Keywords', 'ladystar'); ?>" value="<?php echo get_search_query(); ?>">
    <input type="hidden" required="required" class="input" name="post_type" value="listings">
    <button type="submit" class="submit" value=""><i class="icon ion-ios-search"></i></button>
</form>