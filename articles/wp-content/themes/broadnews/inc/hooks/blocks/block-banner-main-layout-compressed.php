<?php
$broadnews_trending_posts_title = broadnews_get_option('main_trending_news_section_title');
$broadnews_main_posts_title = broadnews_get_option('main_banner_news_section_title');
$broadnews_editors_picks_posts_title = broadnews_get_option('main_editors_picks_section_title');

$broadnews_title_class ='' ;
if(empty($broadnews_main_posts_title)){
    $broadnews_title_class .= 'no-main-slider-title';
}

if(empty($broadnews_trending_posts_title)){
    $broadnews_title_class .= ' no-trending-title';
}

if(empty($broadnews_editors_picks_posts_title)){
    $broadnews_title_class .= ' no-editors-picks-title';
}

?>

<div class="aft-main-banner-part aft-banner-compressed af-container-row-5 <?php echo esc_attr($broadnews_title_class); ?>">

    <div class="aft-slider-part col-66 pad">
        <div class="aft-main-banner-slider-part broadnews-customizer">
            <?php if (!empty($broadnews_main_posts_title)): ?>
               
            <?php endif; ?>
            <?php broadnews_get_block('carousel', 'banner'); ?>
        </div>
    </div>
    <div class="aft-editors-and-trending-part col-3 pad">
        <div class="aft-horizontal-grid-part broadnews-customizer">
            <?php if (!empty($broadnews_editors_picks_posts_title)): ?>
                <?php broadnews_render_section_title($broadnews_editors_picks_posts_title); ?>
            <?php endif; ?>
            <?php broadnews_get_block('thumb-carousel', 'banner'); ?>
        </div>
        <div class="aft-horizontal-trending-part broadnews-customizer">
            <?php if (!empty($broadnews_trending_posts_title)): ?>
                <?php broadnews_render_section_title($broadnews_trending_posts_title); ?>
            <?php endif; ?>
            <?php broadnews_get_block('trending', 'banner'); ?>
        </div>
    </div>
</div>


