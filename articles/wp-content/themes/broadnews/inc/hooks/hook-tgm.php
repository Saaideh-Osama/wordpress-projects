<?php
/**
 * Recommended plugins
 *
 * @package BroadNews
 */

if ( ! function_exists( 'broadnews_recommended_plugins' ) ) :

    /**
     * Recommend plugins.
     *
     * @since 1.0.0
     */
    function broadnews_recommended_plugins() {

        $plugins = array(
            array(
                'name'     => esc_html__( 'AF Companion', 'broadnews' ),
                'slug'     => 'af-companion',
                'required' => false,
            ),
            array(
                'name'     => esc_html__( 'Elespare', 'broadnews' ),
                'slug'     => 'elespare',
                'required' => false,
            ),
            array(
                'name'     => esc_html__( 'Blockspare', 'broadnews' ),
                'slug'     => 'blockspare',
                'required' => false,
            ),
            array(
                'name'     => esc_html__( 'Latest Posts Block', 'broadnews' ),
                'slug'     => 'latest-posts-block-lite',
                'required' => false,
            ),
            array(
                'name'     => esc_html__( 'Magic Content Box', 'broadnews' ),
                'slug'     => 'magic-content-box-lite',
                'required' => false,
            ),
            array(
                'name'     => esc_html__( 'WP Post Author', 'broadnews' ),
                'slug'     => 'wp-post-author',
                'required' => false,
            ),
            array(
                'name'     => esc_html__( 'Free Live Chat using 3CX', 'broadnews' ),
                'slug'     => 'wp-live-chat-support',
                'required' => false,
            )
        );

        tgmpa( $plugins );

    }

endif;

add_action( 'tgmpa_register', 'broadnews_recommended_plugins' );
