<?php
    if (!class_exists('BroadNews_author_info')) :
        /**
         * Adds BroadNews_author_info widget.
         */
        class BroadNews_author_info extends BroadNews_Widget_Base
        {
            /**
             * Sets up a new widget instance.
             *
             * @since 1.0.0
             */
            function __construct()
            {
                $this->text_fields = array('broadnews-author-info-title', 'broadnews-author-info-subtitle', 'broadnews-author-info-image', 'broadnews-author-info-name', 'broadnews-author-info-desc', 'broadnews-author-info-phone', 'broadnews-author-info-email');
                $this->url_fields = array('broadnews-author-info-facebook', 'broadnews-author-info-twitter', 'broadnews-author-info-linkedin', 'broadnews-author-info-instagram', 'broadnews-author-info-vk', 'broadnews-author-info-youtube', 'broadnews-author-info-tiktok');
                
                $widget_ops = array(
                    'classname' => 'broadnews_author_info_widget aft-widget',
                    'description' => __('Displays author info.', 'broadnews'),
                    'customize_selective_refresh' => false,
                );
                
                parent::__construct('broadnews_author_info', __('AFTA Author Info', 'broadnews'), $widget_ops);
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
    
                $broadnews_featured_news_title = apply_filters('widget_title', $instance['broadnews-author-info-title'], $instance, $this->id_base);
               
                
                $profile_image = isset($instance['broadnews-author-info-image']) ? ($instance['broadnews-author-info-image']) : '';
                
                if ($profile_image) {
                    $image_attributes = wp_get_attachment_image_src($profile_image, 'large');
                    $image_src = $image_attributes[0];
                    $image_class = 'data-bg data-bg-hover';
                    
                } else {
                    $image_src = '';
                    $image_class = 'no-bg';
                }
                
                $name = isset($instance['broadnews-author-info-name']) ? ($instance['broadnews-author-info-name']) : '';
                
                $desc = isset($instance['broadnews-author-info-desc']) ? ($instance['broadnews-author-info-desc']) : '';
                $facebook = isset($instance['broadnews-author-info-facebook']) ? ($instance['broadnews-author-info-facebook']) : '';
                $twitter = isset($instance['broadnews-author-info-twitter']) ? ($instance['broadnews-author-info-twitter']) : '';
                $instagram = isset($instance['broadnews-author-info-instagram']) ? ($instance['broadnews-author-info-instagram']) : '';
                $youtube = isset($instance['broadnews-author-info-youtube']) ? ($instance['broadnews-author-info-youtube']) : '';
                $linkedin = isset($instance['broadnews-author-info-linkedin']) ? ($instance['broadnews-author-info-linkedin']) : '';
                $tiktok = isset($instance['broadnews-author-info-tiktok']) ? ($instance['broadnews-author-info-tiktok']) : '';
                $vk = isset($instance['broadnews-author-info-vk']) ? ($instance['broadnews-author-info-vk']) : '';

                echo $args['before_widget'];
                ?>
                <section class="aft-blocks af-author-info pad-v">
                    <div class="af-author-info-wrap">
                        <?php if (!empty($broadnews_featured_news_title)): ?>
                            <?php broadnews_render_section_title($broadnews_featured_news_title); ?>
                        <?php endif; ?>
                    <div class="widget-block widget-wrapper af-widget-body">
                        <div class="posts-author-wrapper">
                            
                            <?php if (!empty($image_src)) : ?>


                                <figure class="read-img af-author-img">
                                    <img src="<?php echo esc_attr($image_src); ?>" alt=""/>
                                </figure>
                            
                            <?php endif; ?>
                            <div class="af-author-details">
                                <?php if (!empty($name)) : ?>
                                    <h4 class="af-author-display-name"><?php echo esc_html($name); ?></h4>
                                <?php endif; ?>
                                <?php if (!empty($desc)) : ?>
                                    <p class="af-author-display-name"><?php echo esc_html($desc); ?></p>
                                <?php endif; ?>
                                
                                <?php if (!empty($facebook) || !empty($twitter) || !empty($linkedin) || !empty($youtube) || !empty($instagram) || !empty($vk)) : ?>
                                    <div class="social-navigation aft-small-social-menu">
                                        <ul>
                                            <?php if (!empty($facebook)) : ?>
                                                <li>
                                                    <a href="<?php echo esc_url($facebook); ?>" target="_blank"></a>
                                                </li>
                                            <?php endif; ?>                                            

                                            <?php if (!empty($twitter)) : ?>
                                                <li>
                                                    <a href="<?php echo esc_url($twitter); ?>" target="_blank"></a>
                                                </li>
                                            <?php endif; ?>

                                            <?php if (!empty($tiktok)) : ?>
                                                <li>
                                                    <a href="<?php echo esc_url($tiktok); ?>" target="_blank"></a>
                                                </li>
                                            <?php endif; ?>  

                                        </ul>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </section>
                <?php
               
                // close the widget container
                echo $args['after_widget'];
              
                
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
                $categories = broadnews_get_terms();
                
                
                if (isset($categories) && !empty($categories)) {
                    // generate the text input for the title of the widget. Note that the first parameter matches text_fields array entry
                    echo parent::broadnews_generate_text_input('broadnews-author-info-title', __('About Author', 'broadnews'), __('Title', 'broadnews'));
                    
                    echo parent::broadnews_generate_image_upload('broadnews-author-info-image', __('Profile image', 'broadnews'), __('Profile image', 'broadnews'));
                    echo parent::broadnews_generate_text_input('broadnews-author-info-name', __('Name', 'broadnews'), __('Name', 'broadnews'));
                    echo parent::broadnews_generate_text_input('broadnews-author-info-desc', __('Descriptions', 'broadnews'), '');
                    echo parent::broadnews_generate_text_input('broadnews-author-info-facebook', __('Facebook', 'broadnews'), '');                    
                    echo parent::broadnews_generate_text_input('broadnews-author-info-twitter', __('Twitter', 'broadnews'), '');
                    echo parent::broadnews_generate_text_input('broadnews-author-info-tiktok', __('TikTok', 'broadnews'), '');       
                }
            }
        }
    endif;