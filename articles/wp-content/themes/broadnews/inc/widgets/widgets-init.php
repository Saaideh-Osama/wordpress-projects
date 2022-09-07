<?php

// Load widget base.
require_once get_template_directory() . '/inc/widgets/widgets-base.php';


/* Theme Widget sidebars. */
require get_template_directory() . '/inc/widgets/widgets-common-functions.php';

/**
 * Load Init for Hook files.
 */

require get_template_directory() . '/inc/widgets/widgets-register-sidebars.php';


/*
* Load Post List
*/

require get_template_directory() . '/inc/widgets/widget-posts-list.php';


/*
* Load Post List
*/

require get_template_directory() . '/inc/widgets/widget-posts-grid.php';


/*
* Load Post List
*/

require get_template_directory() . '/inc/widgets/widget-posts-single-column.php';



/*
* Load Express Posts List
*/

require get_template_directory() . '/inc/widgets/widget-express-posts-grid.php';




/*
 * Load Trending Posts by Tag
 */

require get_template_directory() . '/inc/widgets/widget-trending-posts-by-tag.php';



/*
 * Load Prime News
 */

require get_template_directory() . '/inc/widgets/widget-author-info.php';



/*
* Load Social contact
*/

require get_template_directory() . '/inc/widgets/widget-social-contacts.php';





/* Register site widgets */
if (!function_exists('broadnews_widgets')) :
    /**
     * Load widgets.
     *
     * @since 1.0.0
     */
    function broadnews_widgets()
    {
        register_widget('BroadNews_author_info');        
        register_widget('BroadNews_Posts_lists');        
        register_widget('BroadNews_Express_Posts_Grid');
        register_widget('BroadNews_Express_Posts_Single_Column');        
        register_widget('BroadNews_Featured_Post');        
        register_widget('BroadNews_Trending_Posts_By_Tag');        
        register_widget('BroadNews_Social_Contacts');


    }
endif;
add_action('widgets_init', 'broadnews_widgets');