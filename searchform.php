<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label>
        <span class="screen-reader-text">Search for:</span>
        <input type="search" class="search-field" 
               placeholder="Search Destinations..." 
               value="<?php echo get_search_query(); ?>" name="s" />
        <input type="hidden" name="post_type[]" value="travel_place" />
        <input type="hidden" name="post_type[]" value="travel_story" />
        <input type="hidden" name="post_type[]" value="travel_style" />               
    </label>
    <button type="submit">Search</button>
</form>        
