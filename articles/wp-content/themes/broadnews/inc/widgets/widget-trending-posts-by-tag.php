<?php

if (!class_exists('BroadNews_Trending_Posts_By_Tag')) :
    /**
     * Adds BroadNews_Prime_News widget.
     */
    class BroadNews_Trending_Posts_By_Tag extends BroadNews_Widget_Base
    {
        /**
         * Sets up a new widget instance.
         *
         * @since 1.0.0
         */
        function __construct()
        {
            $this->text_fields = array(
                'broadnews-trending-news-title',
                'broadnews-number-of-posts',

            );
            $this->select_fields = array(

                'broadnews-news_filter-by',
                'broadnews-select-category',

            );

            $widget_ops = array(
                'classname' => 'broadnews_trending_news_widget',
                'description' => __('Displays grid from selected categories.', 'broadnews'),
                'customize_selective_refresh' => false,
            );

            parent::__construct('broadnews_trending_news_by_tag', __('AFTA Trending News (By Tag)', 'broadnews'), $widget_ops);
        }

        /**
         * Front-end display of widget.
         *
         * @see WP_Widget::widget()
         *
         * @param array $args Widget arguments.
         * @param array $instance Saved values from database.
         */

        public function widget($args, $instance)
        {

            $instance = parent::broadnews_sanitize_data($instance, $instance);

            $broadnews_trending_news_section_title = apply_filters('widget_title', $instance['broadnews-trending-news-title'], $instance, $this->id_base);

            $broadnews_no_of_post = 5;
            $broadnews_trending_news_category = !empty($instance['broadnews-select-category']) ? $instance['broadnews-select-category'] : '0';

            $broadnews_filterby = 'tag';

            $broadnews_number_of_posts = 1;
            if ($broadnews_no_of_post) {
                $broadnews_number_of_posts = $broadnews_no_of_post;
            }
            $broadnews_featured_posts = broadnews_get_posts($broadnews_number_of_posts, $broadnews_trending_news_category, $broadnews_filterby);



            // open the widget container
            echo $args['before_widget']; ?>
            <div class="full-wid-resp pad-v">
                <?php

                if (!empty($broadnews_trending_news_section_title)) { ?>
                    <?php broadnews_render_section_title($broadnews_trending_news_section_title); ?>
                <?php }
                ?>

                <div class="slick-wrapper af-trending-widget-carousel af-trending-by-tag-widget-carousel af-post-carousel-list banner-vertical-slider af-widget-carousel af-widget-body">

                    <?php

                    
                    if ($broadnews_featured_posts->have_posts()) :
                        
                        $broadnews_count = 1;
                        while ($broadnews_featured_posts->have_posts()) :
                            $broadnews_featured_posts->the_post();
                            
                            global $post;
                    ?>
                            <div class="slick-item pad">
                                <div class="aft-trending-posts list-part af-sec-post">
                                    <?php do_action('broadnews_action_loop_list', $post->ID, 'thumbnail', $broadnews_count, false, true, false); ?>
                                </div>
                            </div>
                        <?php
                            $broadnews_count++;
                        endwhile;
                        wp_reset_postdata();
                        ?>
                    <?php endif; ?>

                </div>
                <div class="af-widget-trending-carousel-navcontrols af-slick-navcontrols"></div>
            </div>
<?php echo $args['after_widget'];
        }

        /**
         * Back-end widget form.
         *
         * @see WP_Widget::form()
         *
         * @param array $instance Previously saved values from database.
         */
        public function form($instance)
        {
            $this->form_instance = $instance;


            $categories = broadnews_get_terms(0, 'post_tag');

            echo parent::broadnews_generate_text_input('broadnews-trending-news-title', __('Title', 'broadnews'), 'Trending News');
            echo parent::broadnews_generate_select_options('broadnews-select-category', __('Select Tag', 'broadnews'), $categories);
            
        }
    }

endif;
