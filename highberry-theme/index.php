
<?php
/*
Template Name: Головна
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <?php wp_head(); ?>

    <title>HIGHBERRY</title>
</head>

<body>
    <div class="index-all">

        
        <header>
                

           <?php if ( get_field('background_video') ) : ?>
                <video class="video-bg" src="<?php echo esc_url(get_field('background_video')['url']); ?>" autoplay muted loop playsinline></video>
            <?php endif; ?>
            

            <nav class="nav-color-change">
                <div class="navigation-wrapper">

                    <?php if ( get_field('mini_logo', 'option') ) : ?>
                        <img 
                            class="company-logo-first green-fiter" 
                            src="<?php echo esc_url(get_field('mini_logo', 'option')['url']); ?>">
                    <?php endif; ?>


                    <div class="inner-section-fist">
                        <div class="catalog-pdf">
                            <a class="link green-fiter" href="">
                                <?php if ( get_field('catalog', 'option') ) : ?>
                                    <?php echo get_field('catalog', 'option'); ?>
                                <?php endif; ?> 
                            </a>
        
                            <?php if ( get_field('pdf_img', 'option') ) : ?>
                                <img 
                                    class="pdf-image green-fiter" 
                                    src="<?php echo esc_url(get_field('pdf_img', 'option')['url']); ?>" 
                                    alt="<?php echo esc_attr(get_field('pdf_img', 'option')['alt'] ?: 'catalog_pdf'); ?>">
                            <?php endif; ?>
                        
                        </div>
                    
                        <div class="inner-section-second">
                            <?php if ( have_rows('icons', 'option') ) : ?>
                                <div class="icons flex-wrapper">
                                    
                                    <?php while ( have_rows('icons', 'option') ) : the_row();
                                        $class = get_sub_field('icon');
                                        $url = get_sub_field('icon_url');
                                    ?>
                                        <a href="<?php echo esc_url($url); ?>" target="_blank" rel="noopener">
                                            <i class="green-fiter <?php echo esc_attr($class); ?>" style="color: #ffffff;"></i>
                                        </a>
                                    <?php endwhile; ?>
                                </div>
                            <?php endif; ?>
        
                            <div class="languages">
                                <p>UA &#124; EN &#124; PL &#124;</p>
                            </div>
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

            <div class="hero-block">
        
                <div class="img-slogan">
                    <?php if ( get_field('big_logo') ) : ?>
                        <div>
                        
                            <img 
                                class="company-logo-second" 
                                src="<?php echo esc_url(get_field('big_logo')['url']); ?>" 
                                alt="<?php echo esc_attr(get_field('big_logo')['alt'] ?: 'big_logo'); ?>">
                        </div>
                    <?php endif; ?>
                    
                    <?php if ( get_field('slogan') ) : ?>
                        <div class="slogan"> 
                            <p><?php echo get_field('slogan'); ?></p>
                        </div>
                    <?php endif; ?>
                </div>      
            </div>

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
                            <?php echo get_field('showreel_text'); ?>
                        <?php endif; ?> 
                    </span>    
                </button>

                <button class="anchor-down-arrow">

                    <?php if ( get_field('down_arrow_img') ) : ?>
                        <img 
                            src="<?php echo esc_url(get_field('down_arrow_img')['url']); ?>" >
                    <?php endif; ?>
                </button>
            </div>       

        </header>

        
        <div class="we-near flex-wrapper">
            <?php if ( get_field('we_near_title') ) : ?>
                <div class="title"> 
                    <p><?php echo get_field('we_near_title'); ?></p>
                </div>
            <?php endif; ?>

            <div class="icon-container">
                <?php if ( have_rows('icon_info') ) : ?>
                    <?php while ( have_rows('icon_info') ) : the_row(); ?>
                    
                        <?php if ( have_rows('we_near_icon_info_group') ) : ?>
                                
                                <?php while( have_rows('we_near_icon_info_group') ) : the_row(); 
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
                    
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>

            <?php if ( get_field('export_map', 'option') ) : ?>
                <div class="map-img">
                    <img 
                        src="<?php echo esc_url(get_field('export_map', 'option')['url']); ?>">
                </div>
            <?php endif; ?>

            <div class="two-column-info">
                
                <?php 
                    if ( get_field('undermap_1') ) : ?>
                    <p><?php echo get_field('undermap_1'); ?></p>
                <?php endif; ?>
                  
                <?php 
                    $undermap2 = get_field('undermap_2', false, false);
                    $know_more_link = get_field('know_more_link');
                    $know_more_text = get_field('know_more_text');
                    $know_more_arrow = get_field('know_more_img');
                ?>

                <?php if ( $undermap2 || $know_more_link ) : ?>
                    <p>
                        <?php echo esc_html($undermap2); ?>

                        <?php if ( $know_more_link && $know_more_text ) : ?>
                            <a class="green-link" href="<?php echo esc_attr($know_more_link['url']); ?>">
                                <?php echo esc_html($know_more_text); ?>
                                <?php if ( $know_more_arrow ) : ?>
                                    <img src="<?php echo esc_url($know_more_arrow['url']); ?>" alt="">
                                <?php endif; ?>
                            </a>
                                
                        <?php endif; ?>
                    </p>
                <?php endif; ?>

            </div>
        </div>


        <div class="fresh-production-section first">

            <?php 
            $items = get_field('accordion_fresh_content');
            if ($items) : 
            ?>

                <div class="image-section">
                    <?php foreach ($items as $item) : 
                        $image = $item['accordion_img'];
                        $filename = pathinfo($image['filename'], PATHINFO_FILENAME);
                    ?>
                        <img 
                            id="<?php echo esc_attr($filename); ?>" 
                            class="<?php echo $filename === 'strawberry' ? 'active' : ''; ?>" 
                            src="<?php echo esc_url($image['url']); ?>" 
                            alt="<?php echo esc_attr($image['alt']); ?>"
                        >
                    <?php endforeach; ?>
                </div>

                <div class="slider-text-content production-section">

                    <?php if (get_field('accordion_fresh_title') ): ?>
                        <p class="title"><?php echo esc_html(get_field('accordion_fresh_title') ); ?></p>
                    <?php endif; ?>

                    <?php foreach ($items as $item) : 
                        $title = $item['title'];
                        $information = $item['information'];
                        $image = $item['accordion_img'];
                        $filename = pathinfo($image['filename'], PATHINFO_FILENAME);
                        
                    ?>

                    <div class="accordion" data-image="<?php echo esc_attr($filename); ?>">

                        <div class="accordion-icon">
                            <span class="ellipse"></span>
                            <span class="line"></span>
                        </div>
                                
                        <div class="accordion-text">
                            <?php if ($title): ?>
                                <p class="title-text"><?php echo esc_html($title); ?></p>
                            <?php endif; ?>

                            <div class="accordion-content">
                                <?php if ($information): ?>
                                    <p><?php echo  wpautop( esc_html($information)); ?>

                                        <?php if ( $know_more_link && $know_more_text ) : ?>
                                            <a class="green-link" href="<?php echo esc_attr($know_more_link['url']); ?>">
                                                <?php echo esc_html($know_more_text); ?>
                                                <?php if ( $know_more_arrow ) : ?>
                                                    <img src="<?php echo esc_url($know_more_arrow['url']); ?>" alt="">
                                                <?php endif; ?>
                                            </a>
                                                
                                        <?php endif; ?>
                                    </p>
                                <?php endif; ?>

                            </div>

                        </div>
                    </div>

                    <?php endforeach; ?>
                </div>

            <?php endif; ?>
        </div>


        <div class="growing">
            <?php if ( get_field('growing_title') ) : ?>
                <div class="title">
                    <p><?php echo get_field('growing_title'); ?></p>
                </div>
            <?php endif; ?>

            <div class="icon-container">
                <?php if ( have_rows('icon_info') ) : ?>
                    <?php while ( have_rows('icon_info') ) : the_row(); ?>
                    
                        <?php if ( have_rows('growing_icon_info_group') ) : ?>
                                
                                <?php while( have_rows('growing_icon_info_group') ) : the_row(); 
                                    $icon   = get_sub_field('icon');
                                    $number = get_sub_field('value_bold');
                                    $unit   = get_sub_field('value_regular');
                                    $info   = get_sub_field('info');
                                ?>
                                    <div class="icons-info">
                                        <div class="green-circle">
                                            <?php if ( $icon ) : ?>
                                                <img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt'] ?: 'icon'); ?>">
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
                    
                    <?php endwhile; ?>
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


            <div class="two-column-info">
                
                <?php 
                    if ( get_field('map_slider_column_1') ) : ?>
                    <p><?php echo get_field('map_slider_column_1'); ?></p>
                <?php endif; ?>

                <?php 
                    if ( get_field('map_slider_column_2') ) : ?>
                    <p>
                        <?php echo get_field('map_slider_column_2'); ?>

                        <?php if ( $know_more_link && $know_more_text ) : ?>
                            <a class="green-link" href="<?php echo esc_attr($know_more_link['url']); ?>">
                                <?php echo esc_html($know_more_text); ?>
                                <?php if ( $know_more_arrow ) : ?>
                                    <img src="<?php echo esc_url($know_more_arrow['url']); ?>" alt="">
                                <?php endif; ?>
                            </a>
                        <?php endif; ?>
                    </p>
                <?php endif; ?>
            </div>

        </div>


        <div class="frozen">

            <?php 
            $slider_items = get_field('frozen_slider');
            $classes = ['selected', 'second', 'third', 'fourth', 'fifth'];

            if ($slider_items) : 
                $count = count($slider_items);
            ?>

                <div class="slider-img-container">
                    <?php for ($i = 0; $i < $count; $i++) : 
                        $item = $slider_items[$i];
                        $image = $item['image'];
                        $class = ($i < count($classes)) ? $classes[$i] : '';
                    ?>
                        <div class="slider-img-item <?php echo esc_attr($class); ?>">
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                        </div>
                    <?php endfor; ?>
                </div>

                <div class="slider-text-content">
                    <?php if (get_field('frozen_slider_title')) : ?>
                        <p class="title"><?php echo esc_html(get_field('frozen_slider_title')); ?></p>
                    <?php endif; ?>

                    <?php for ($i = 0; $i < $count; $i++) : 
                        $item = $slider_items[$i];
                        $title = $item['title'];
                        $info = $item['information'];
                    ?>
                        <div class="accordion layers-accordion <?php echo $i === 0 ? 'active' : ''; ?>" data-index="<?php echo $i; ?>">
                            <div class="accordion-icon">
                                <span class="ellipse"></span>
                            </div>
                            <div class="accordion-text">
                                <p class="title-text"><?php echo esc_html($title); ?></p>
                                <div class="accordion-content">
                                    <?php if (!empty($info)) : ?>
                                        <p><?php echo esc_html($info); ?></p>
                                        <?php if ($i === 1): ?>
                                            <a class="green-link" href="#">ДІЗНАЙТЕСЯ БІЛЬШЕ <img src="<?php echo get_template_directory_uri(); ?>/assets/img/Arrow -green.png" alt=""></a>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endfor; ?>
                </div>

            <?php endif; ?>

        </div>


        <div class="production flex-wrapper">
            <?php if ( get_field('production_title') ) : ?>
                <div class="title min-630">
                    <p><?php echo get_field('production_title'); ?></p>
                </div>
            <?php endif; ?>

            <div class="round-border-container production-content flex-wrapper">
                <?php if ( get_field('production_title') ) : ?>
                    <div class="title max-630">
                        <p><?php echo get_field('production_title'); ?></p>
                    </div>
                <?php endif; ?>

                <?php if ( get_field('prodution_img') ) : ?>
                    <div class="img-container">
                        <img 
                            src="<?php echo esc_url(get_field('prodution_img')['url']); ?>" 
                            alt="<?php echo esc_attr(get_field('prodution_img')['alt'] ?: 'prodution_img'); ?>">
                    </div>
                <?php endif; ?>

                <div class="two-column-info">
                        
                    <?php if ( get_field('production_information') ) : ?>
                                <p>
                                    <?php echo get_field('production_information'); ?>
                               
                                    <?php if ( $know_more_link && $know_more_text ) : ?>
                                        <a class="green-link" href="<?php echo esc_attr($know_more_link['url']); ?>">
                                            <?php echo esc_html($know_more_text); ?>
                                            <?php if ( $know_more_arrow ) : ?>
                                                <img src="<?php echo esc_url($know_more_arrow['url']); ?>" alt="">
                                            <?php endif; ?>
                                        </a>
                                    <?php endif; ?>
                                </p>
                    <?php endif; ?>         
                    
                </div>
            </div>

            <div class="icon-container">
                <?php if ( have_rows('icon_info') ) : ?>
                    <?php while ( have_rows('icon_info') ) : the_row(); ?>
                    
                        <?php if ( have_rows('production_icon_info_group') ) : ?>
                                
                                <?php while( have_rows('production_icon_info_group') ) : the_row(); 
                                    $icon   = get_sub_field('icon');
                                    $number = get_sub_field('value_bold');
                                    $unit   = get_sub_field('value_regular');
                                    $info   = get_sub_field('info');
                                ?>
                                    <div class="icons-info">
                                        <div class="green-circle">
                                            <?php if ( $icon ) : ?>
                                                <img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt'] ?: 'icon'); ?>">
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
                    
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>

            <div class="title">
                <p>
                    <?php 
                        if ( get_field('second_accordion_title') ) : ?>
                        <p><?php echo get_field('second_accordion_title'); ?></p>
                    <?php endif; ?>
                </p>
            </div>


        </div>

        <div class="fresh-production-section second">

            <?php 
            $items = get_field('second_accordion');
            if ($items) : 
            ?>

                <div class="image-section">
                    <?php foreach ($items as $item) : 
                        $image = $item['accordion_img'];
                        $filename = pathinfo($image['filename'], PATHINFO_FILENAME);
                    ?>
                        <img 
                            id="<?php echo esc_attr($filename); ?>" 
                            class="<?php echo $filename === 'washing' ? 'active' : ''; ?>" 
                            src="<?php echo esc_url($image['url']); ?>" 
                            alt="<?php echo esc_attr($image['alt']); ?>"
                        >
                    <?php endforeach; ?>
                </div>

                <div class="slider-text-content production-section">
                    <?php foreach ($items as $item) : 
                        $title = $item['title'];
                        $information = $item['information'];
                        $image = $item['accordion_img'];
                        $filename = pathinfo($image['filename'], PATHINFO_FILENAME);
                        
                    ?>

                    <div class="accordion" data-image="<?php echo esc_attr($filename); ?>">

                        <div class="accordion-icon">
                            <span class="ellipse"></span>
                            <span class="line"></span>
                        </div>
                                
                        <div class="accordion-text">
                            <?php if ($title): ?>
                                <p class="title-text"><?php echo esc_html($title); ?></p>
                            <?php endif; ?>

                            <div class="accordion-content">
                                <?php if ($information): ?>
                                    <p><?php echo  wpautop( esc_html($information)); ?>

                                        <?php if ( $know_more_link && $know_more_text ) : ?>
                                            <a class="green-link" href="<?php echo esc_attr($know_more_link['url']); ?>">
                                                <?php echo esc_html($know_more_text); ?>
                                                <?php if ( $know_more_arrow ) : ?>
                                                    <img src="<?php echo esc_url($know_more_arrow['url']); ?>" alt="">
                                                <?php endif; ?>
                                            </a>
                                                
                                        <?php endif; ?>
                                    </p>
                                <?php endif; ?>

                            </div>

                        </div>
                    </div>

                    <?php endforeach; ?>
                </div>

            <?php endif; ?>

        </div>

        <div class="youtube-video-section flex-wrapper">
            <div class="video">

                <?php if ( get_field('video_link') ) : ?>
                    <iframe 
                        src="<?php echo esc_url(get_field('video_link')['url']); ?>" 
                        title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
                    </iframe>
                <?php endif; ?>

            </div>
        </div>


        <?php get_template_part('footer'); ?>

    </div>

    <?php wp_footer(); ?>
    
</body>
</html>