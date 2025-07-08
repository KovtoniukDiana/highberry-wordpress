

<?php 

    function theme_path($path = '') {
        return site_url('/wp-content/themes/highberry-theme/' . ltrim($path, '/'));
    }

    add_action('wp_enqueue_scripts', 'myportfolio_styles');

    function myportfolio_styles() {
        wp_enqueue_style('main-style', theme_path('assets/css/main.css'));

       wp_enqueue_script('jquery');

        wp_enqueue_script('jquery-script', theme_path('assets/js/jquery-3.7.1.min.js'), array('jquery'), null, true);
        wp_enqueue_script('menu-script', theme_path('assets/js/menu.js'), array(), null, true);
        wp_enqueue_script('main-page-script', theme_path('assets/js/slider-main-page.js'), array(), null, true);
        wp_enqueue_script('map-script', theme_path('assets/js/map-animation.js'), array(), null, true);
        wp_enqueue_script('growing-script', theme_path('assets/js/growing-slider.js'), array(), null, true);
        wp_enqueue_script('product-menu-script', theme_path('assets/js/product-menu.js'), array(), null, true);
    }

    add_filter('big_image_size_threshold', '__return_false');

    add_action('acf/init', function() {
        if (function_exists('acf_add_options_page')) {

            acf_add_options_page(array(
                'page_title'    => 'Налаштування сайту',
                'menu_title'    => 'Налаштування сайту',
                'menu_slug'     => 'site-settings',
                'capability'    => 'edit_posts',
                'redirect'      => false
            ));
        }
});


add_filter('acf/load_field/name=selected_top_page_block', function( $field ) {
    $field['choices'] = [];

    if ( have_rows('top-page-section', 'option') ) {
        while ( have_rows('top-page-section', 'option') ) {
            the_row();
            $title = get_sub_field('block_page_id');
            if ( $title ) {
                $field['choices'][$title] = $title;
            }
        }
    }

    return $field;
});


?>


