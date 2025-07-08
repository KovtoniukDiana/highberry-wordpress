<?php
/*
Template Name: Вирощування
*/
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php wp_head(); ?>

    <title>Growing</title>
</head>
<body>

    <div class="growing-all">

        <header class="grey-background">
            <nav>
                <div class="navigation-wrapper">
                    <?php if ( get_field('red_mini_logo', 'option') ) : ?>
                        <img 
                            class="company-logo-first" 
                            src="<?php echo esc_url(get_field('red_mini_logo', 'option')['url']); ?>">
                    <?php endif; ?>
    
                    <div class="inner-section-fist">
                        <div class="catalog-pdf">
                            <a class="link green-fiter" href="">
                                <?php if ( get_field('catalog', 'option') ) : ?>
                                    <?php the_field('catalog', 'option'); ?>
                                <?php endif; ?> 
                            </a>
        
                            <?php if ( get_field('pdf_img', 'option') ) : ?>
                                <img 
                                    class="pdf-image green-fiter" 
                                    src="<?php echo esc_url(get_field('pdf_img', 'option')['url']); ?>" 
                                    alt="<?php echo esc_attr(get_field('pdf_img', 'option')['alt'] ?: 'catalog_pdf'); ?>">
                            <?php endif; ?>
                        </div>
                    
                        <div class="languages">
                            <p>UA &#124; EN &#124; PL &#124;</p>
                        </div>
                    </div> 

                    <?php if ( get_field('menu_img', 'option') ) : ?>
                        <img 
                            class="menu-img green-fiter" 
                            src="<?php echo esc_url(get_field('menu_img', 'option')['url']); ?>" 
                            alt="<?php echo esc_attr(get_field('menu_img', 'option')['alt'] ?: 'menu_img'); ?>">
                    <?php endif; ?>
                </div>
            </nav>
    
            <div class="opened-menu">
                <div class="menu ">
                    <div class="controls">
                        <div class="languages">
                            <p>UA &#124; EN &#124; PL &#124;</p>
                        </div>
        
                        <div class="buttons flex-wrapper">
                            <a class="flex-wrapper" href="<?php echo esc_url(get_field('home_page_link', 'option')['url']);?>">
                                <?php if ( get_field('home_page_image', 'option') ) : ?>
                                    <img 
                                        class="home" 
                                        src="<?php echo esc_url(get_field('home_page_image', 'option')['url']); ?>" >
                                <?php endif; ?>
                            </a>

                            <?php if ( get_field('close_menu_image', 'option') ) : ?>
                                <img 
                                    class="close-menu" 
                                    src="<?php echo esc_url(get_field('close_menu_image', 'option')['url']); ?>" >
                            <?php endif; ?>        
                        </div>     
                    </div>


                    <?php if( have_rows('menu_list', 'option') ): ?>
                        <ul class="ul-item">
                            <?php while( have_rows('menu_list', 'option') ): the_row(); 
                                $name = get_sub_field('name');
                                $link = get_sub_field('link');
                                $open_subitem = get_sub_field('open_submen_image');

                            ?>
                                <li class="li-item">
                                    <?php if ($link): ?>
                                        <a href="<?php echo esc_url($link['url']); ?>">
                                            <?php echo esc_html($name); ?>

                                            <?php if ($open_subitem): ?>
                                                <img class="can-open" src="<?php echo esc_url($open_subitem['url']); ?>" alt="">
                                            <?php endif; ?>
                                        </a>
                                    <?php endif; ?>

                                    <?php if( have_rows('subitem') ): ?>
                                        <ul class="submenu">
                                            <?php while( have_rows('subitem') ): the_row(); ?>
                                                <li>
                                                    <a href="<?php echo esc_url(get_sub_field('subitem_link')['url']); ?>">
                                                        <?php echo esc_html(get_sub_field('subitem_name')); ?>
                                                    </a>
                                                </li>
                                            <?php endwhile; ?>
                                        </ul>
                                    <?php endif; ?>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>
        
                    <div class="gorizontal-line"></div>
        
                    <div class="contacts">

                        <?php if( have_rows('contacts', 'option') ): ?>
                            <div class="number">
                                <?php while( have_rows('contacts', 'option') ): the_row(); ?>
                                
                                    <?php if ( get_sub_field('number') ) : ?>
                                        <p><?php the_sub_field('number'); ?></p>
                                    <?php endif; ?>  

                                <?php endwhile; ?>     
                            </div>

                            <?php reset_rows(); ?>

                            <div class="region">
                                <?php while( have_rows('contacts', 'option') ): the_row(); ?>

                                    <?php if ( get_sub_field('label') ) : ?>
                                        <p><?php the_sub_field('label'); ?></p>
                                    <?php endif; ?> 
                                    
                                <?php endwhile; ?>       
                            </div>
                                
                            
                        <?php endif; ?>
                        
                    </div>
                </div>
            </div>

            <?php
            if ( get_field('selected_top_page_block') && have_rows('top-page-section', 'option') ) :
                while ( have_rows('top-page-section', 'option') ) : the_row();
                    if ( get_sub_field('block_page_id') === get_field('selected_top_page_block') ) :
                        $img = get_sub_field('background_image');
                        $title = get_sub_field('info_block_title');
                        $text = get_sub_field('info_block_information'); ?>
            
    
                        <div class="header-background"> 
                            <?php if ( $img ) : ?>
                                <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr($img['alt'] ?: 'header background'); ?>">
                            <?php endif; ?>
                        </div>
    

                        <div class="info-block grey-shadow-box">
                            <div class="title"> 
                                <?php if ( $title ) : ?>
                                    <p><?php echo esc_html($title); ?></p>
                                <?php endif; ?>
                            </div>
                
                            <div class="gorizontal-line"></div>
                
                            <div class="information">
                                <?php if ( $text ) : ?>
                                    <p><?php echo nl2br(esc_html($text)); ?></p>
                                <?php endif; ?>
                            </div>


                            <div class="icon-container">
                                <?php if ( have_rows('icon_info') ) : ?>
                                    <?php while ( have_rows('icon_info') ) : the_row(); 
                                                
                                        $icon   = get_sub_field('icon');
                                        $number = get_sub_field('value_bold');
                                        $unit   = get_sub_field('value_regular');
                                        $info   = get_sub_field('info');
                                    ?>
                                        <div class="icons-info">
                                            <div class="green-circle">
                                                <?php if ( $icon ) : ?>
                                                    <img src="<?php echo esc_url($icon['url']); ?>" 
                                                    alt="<?php echo esc_attr($icon['alt'] ?: 'icon'); ?>">
                                                <?php endif; ?>
                                            </div>
                                                        
                                            <div class="facts">
                                                <div class="inline-group">
                                                    <p class="bold-text"><?php echo esc_html($number); ?></p>
                                                    <p><?php echo esc_html($unit); ?></p>
                                                </div>
                                                <p class="regular-text"><?php echo nl2br(esc_html($info)); ?></p>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif;?>    
                <?php endwhile; ?>
            <?php endif; ?>

        </header>
    
        <div class="growing grey-background">
    
            <div class="title">
                <?php if ( get_field('growing_slider_title') ) : ?>
                    <p><?php the_field('growing_slider_title'); ?></p>
                <?php endif; ?> 
            </div>
    
    
            <?php if( have_rows('map_growing_slider', 'option') ): ?>

                <div class="product-map-selection round-border-container"  style="background-image: url('<?php echo esc_url(get_field('slider_background_img', 'option')['url'] ?? ''); ?>');">
                    <div class="grid-vegetables-container">
                        <?php while( have_rows('map_growing_slider', 'option') ): the_row(); 
                            $icon = get_sub_field('product_icon');
                            $name = get_sub_field('product_name');
                            $area = get_sub_field('area');
                            $classes = get_sub_field('classes');
                            $icon_pos = get_sub_field('icon_order');
                        ?>
                        <div class="grid-item   <?php echo esc_attr($classes); ?>">
                            <?php if ($icon_pos === 'before text'): ?>
                                <div class="pointer-div">
                                    <img src="<?php echo esc_url($icon['url']); ?>">
                                </div>
                            <?php endif; ?>

                            <div class="divider-text round-border-container hidden">
                                <p><?php echo esc_html($name); ?></p>
                                <span class="divider">&#124;</span>
                                <p><?php echo esc_html($area); ?></p>
                            </div>

                            <?php if ($icon_pos === 'after text'): ?>
                                <div class="pointer-div">
                                    <img src="<?php echo esc_url($icon['url']); ?>">
                                </div>
                            <?php endif; ?>
                        </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    
        <div class="grey-background">
            <?php if ( have_rows('image_info_grid') ) : ?>
                <div class="grid-img-info">
                    <?php while ( have_rows('image_info_grid') ) : the_row(); 
                        $image = get_sub_field('grid_image');
                        $icon = get_sub_field('info_icon');
                        $title = get_sub_field('info_title');
                        $text = get_sub_field('information');
                        $position = get_sub_field('image_position');
                    ?>

                    <?php if ( $position === 'before' && $image ) : ?>
                        <div class="image-item">
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt'] ?? ''); ?>">
                        </div>
                    <?php endif; ?>

                    <?php if ( $title || $text || $icon ) : ?>
                        <div class="text-item grey-shadow-box">
                            <?php if ( $icon ) : ?>
                                <div class="green-circle">
                                    <img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt'] ?? ''); ?>">
                                </div>
                            <?php endif; ?>

                            <?php if ( $title ) : ?>
                                <div class="title">
                                    <p><?php echo esc_html($title); ?></p>
                                </div>
                            <?php endif; ?>

                            <div class="gorizontal-line"></div>

                            <?php if ( $text ) : ?>
                                <div class="information">
                                    <p><?php echo nl2br( esc_html($text) ); ?></p>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <?php if ( $position === 'after' && $image ) : ?>
                        <div class="image-item">
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt'] ?? ''); ?>">
                        </div>
                    <?php endif; ?>

                    <?php endwhile; ?>
                </div>
            <?php endif; ?>


            <?php if ( get_field('background-video', 'option') ) : ?>

                <div class="video-showreel">
                    <iframe src="<?php echo esc_url(get_field('background-video', 'option')['url']); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>

            <?php endif; ?>

    
            <div class="showreel flex-wrapper">
                <button class="watch flex-wrapper">

                    <?php if ( get_field('showreel_img') ) : ?>
                        <img 
                            src="<?php echo esc_url(get_field('showreel_img')['url']); ?>">
                    <?php endif; ?>

                    <span>
                        <?php if ( get_field('showreel_text') ) : ?>
                            <?php the_field('showreel_text'); ?>
                        <?php endif; ?> 
                    </span>    
                </button>
            </div>       

        </div>
    
        <div class="gorizontal-slider  first-slider">

            <?php
                $slides = get_field('slider_gorizontal_accordion_first');
                if ( $slides ) :
            ?>

                <div class="slider-image">

                    <div class="img-wrapper">
                        <?php foreach ( $slides as $slide ) :
                            $sliderImage = $slide['slider_image'];
                        ?>
                            <?php if ( $sliderImage ) : ?>
                                <img src="<?php echo esc_url($sliderImage['url']); ?>" 
                                    class="slider-img-main"
                                    alt="<?php echo esc_attr($sliderImage['alt'] ?? 'sliderImage'); ?>">
                                <?php endif; ?>
                        <?php endforeach; ?>
                    </div>

                    <div class="change-section flex-wrapper">

                        <span class="prev controls"><</span>

                        <?php foreach ( $slides as $slide ) :
                            $name = $slide['name_of_product'];
                        ?>
                            <?php if ( $name ) : ?>
                                <span class="name"><?php echo esc_html($name); ?></span>
                            <?php endif; ?>
                        <?php endforeach; ?>

                        <span class="next controls">></span>

                    </div>
                </div>

                <div class="gorizontal-accordion">
                    <div class="line-ellipce flex-wrapper">
                        <?php foreach ( $slides as $slide ) :?>
                            <div class="item flex-wrapper">
                                <div class="ellipse"></div>
                                <div class="line"></div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="wrapper-under-animation">
                    <div class="little-photo-container">
                        <?php foreach ( $slides as $slide ) :
                            $sliderImage = $slide['slider_image'];
                        ?>
                            <?php if ( $sliderImage ) : ?>
                                <img src="<?php echo esc_url($sliderImage['url']); ?>" 
                                    class="slider-img"
                                    alt="<?php echo esc_attr($sliderImage['alt'] ?? 'sliderImage'); ?>">
                                <?php endif; ?>
                        <?php endforeach; ?> 
                    </div>

                    <div class="text-block">
                        <div class="title little-title">
                            <?php foreach ( $slides as $slide ) :
                                $name = $slide['name_of_product'];
                            ?>
                                <?php if ( $name ) : ?>
                                    <span class="name"><?php echo esc_html($name); ?></span>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            
                            <div class="gorizontal-line"></div>
                        </div>

                        <?php while ( have_rows('slider_gorizontal_accordion_first') ) : the_row(); ?>
                            <?php if ( have_rows('icon_info') ) : ?>
                                <div class="icon-text-group">
                                    <?php while ( have_rows('icon_info') ) : the_row(); 
                                                    
                                        $icon   = get_sub_field('icon');
                                        $number = get_sub_field('value_bold');
                                        $unit   = get_sub_field('value_regular');
                                        $info   = get_sub_field('info');
                                    ?>
                                        <div class="icons-info">
                                            <div class="green-circle">
                                                <?php if ( $icon ) : ?>
                                                    <img src="<?php echo esc_url($icon['url']); ?>" 
                                                    alt="<?php echo esc_attr($icon['alt'] ?: 'icon'); ?>">
                                                <?php endif; ?>
                                            </div>
                                                            
                                            <div class="facts">
                                                <div class="inline-group">
                                                    <p class="bold-text"><?php echo esc_html($number); ?></p>
                                                    <p><?php echo esc_html($unit); ?></p>
                                                </div>
                                                <p class="regular-text"><?php echo (esc_html($info)); ?></p>
                                            </div>
                                        </div>
                                
                                    <?php endwhile; ?>
                                </div>
                            <?php endif; ?>
                        <?php endwhile; ?>    
                    </div>
                </div>

            <?php endif; ?>
        </div>
    
        <div class="grey-background grey-footer">
            <?php get_template_part('footer'); ?>
        </div>
    
        <div class="second-gorizontal-slider">
            <div class="gorizontal-slider second-slider">

                <?php
                    $slides = get_field('slider_gorizontal_accordion_second');
                    if ( $slides ) :
                ?>
                                
                    <div class="slider-image">

                        <div class="img-wrapper">
                            <?php foreach ( $slides as $slide ) :
                                $sliderImage = $slide['slider_image'];
                            ?>
                                <?php if ( $sliderImage ) : ?>
                                    <img src="<?php echo esc_url($sliderImage['url']); ?>" 
                                        class="slider-img-main"
                                        alt="<?php echo esc_attr($sliderImage['alt'] ?? 'sliderImage'); ?>">
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
            
                        <div class="change-section flex-wrapper">
                            <span class="prev controls"><</span>

                            <?php foreach ( $slides as $slide ) :
                                $name = $slide['name'];
                            ?>
                                <?php if ( $name ) : ?>
                                    <span class="name"><?php echo esc_html($name); ?></span>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <span class="next controls">></span>
                        </div>
                    </div>


                    <div class="gorizontal-accordion">
                        <div class="line-ellipce grey-background flex-wrapper">

                            <?php foreach ( $slides as $slide ) :?>
                                <div class="item flex-wrapper">
                                    <div class="ellipse"></div>
                                    <div class="line"></div>
                                </div>
                            <?php endforeach; ?>
                            
                        </div>
        
                        <div class="slider-information grey-background flex-wrapper">

                            <?php foreach ( $slides as $slide ) :
                                $info = $slide['slider_information'];
                            ?>
                                <?php if ( $info ) : ?>
                                    <div class="info flex-wrapper">
                                        <p>
                                            <?php echo esc_html($info); ?>

                                            <?php 
                                                $know_more_link = get_field('know_more_link');
                                                $know_more_text = get_field('know_more_text');
                                                $know_more_arrow = get_field('know_more_image');
                                            ?>

                                            <?php if ( $know_more_link && $know_more_text ) : ?>
                                                <a class="green-link" href="<?php echo esc_attr($know_more_link['url']); ?>">
                                                    <?php echo esc_html($know_more_text); ?>
                                                    <?php if ( $know_more_arrow ) : ?>
                                                        <img src="<?php echo esc_url($know_more_arrow['url']); ?>" alt="">
                                                    <?php endif; ?>
                                                </a>    
                                            <?php endif; ?>
                                        </p>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div> 
        </div>
    
        <div class="process-animation">
           <div class="grid-process">
            <?php if( have_rows('slider_icon_image') ): ?>
                <?php 
                    $images = [];
                    while( have_rows('slider_icon_image') ): the_row(); 
                        $slider_image = get_sub_field('slider_image');
                        $icon = get_sub_field('icon');
                        $name = get_sub_field('name');
                        $data_img = get_sub_field('data_image');


                        if ($slider_image) {
                            $images[$data_img] = $slider_image['url'];
                        }
                ?>
                    <div class="item" data-img="<?php echo esc_attr($data_img); ?>">
                        <div class="icons-info">
                            <div class="green-circle">
                                <?php if( $icon ): ?>
                                    <img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($name); ?>">
                                <?php endif; ?>
                            </div>
                            <div class="facts">
                                <div class="inline-group">
                                    <p class="bold-text"><?php echo esc_html($name); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
                
                
                <div class="photo-container">
                    <?php 
                        $first = true;
                        foreach ($images as $data_img => $img_url): ?>
                            <img data-img="<?php echo esc_attr($data_img); ?>" 
                                <?php if($first){ echo 'class="active"'; $first = false; } ?> 
                                src="<?php echo esc_url($img_url); ?>" 
                                alt="">
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>

    
        </div>
    
    </div>
    

    <?php wp_footer(); ?>

    
</body>
</html