<?php
/*
Template Name: Сторінка продукту
*/
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php wp_head(); ?>

    <title>Product-item</title>
</head>
<body>
    <div class="product-all product-item-all">

        
        <header>
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
    
            <div class="header-background" style = "background-image: url(<?php echo esc_url(get_field('header_image')['url'] ?? '') ; ?>);">
                <div class="black-background"></div>
    
                <div class="text flex-wrapper">
                    <?php if ( get_field('top_page_title') ) : ?>
                        <p><?php echo get_field('top_page_title'); ?></p>
                    <?php endif; ?>

                    <div class="white-gorizontal"></div>
                </div>
            </div>
        </header>

        <div class="grey-background flex-wrapper">
            <div class="content-wrapper">

                <div class="menu flex-wrapper">
                    <div class="green-circle menu-icon">

                        <?php if ( get_field('open_product_submenu_img', 'option') ) : ?>
                            <img 
                                class="regular-icon" 
                                src="<?php echo esc_url(get_field('open_product_submenu_img', 'option')['url']); ?>" >
                        <?php endif; ?>
                        
                        <?php if ( get_field('open_submenu_img_active', 'option') ) : ?>
                            <img 
                                class="active-icon" 
                                src="<?php echo esc_url(get_field('open_submenu_img_active', 'option')['url']); ?>" >
                        <?php endif; ?>
                    </div>

                    <div class="gorizontal-line"></div>

                    <div class="submenu">

                        <?php if ( have_rows('submenu', 'option') ) : ?>
                            <ul>
                                <?php while ( have_rows('submenu', 'option') ) : the_row();?>
                            
                                    <li>
                                        <a href="<?php echo esc_url(get_sub_field('item_link')['url']);?>">

                                            <?php if ( get_sub_field('item') ) : ?>
                                                <?php echo get_sub_field('item'); ?>
                                            <?php endif; ?> 

                                            <?php if ( get_sub_field('open_item') ) : ?>
                                                <img 
                                                    class="open" 
                                                    src="<?php echo esc_url(get_sub_field('open_item')['url']); ?>" >
                                            <?php endif; ?>   
                                        </a>
                                        
                                        <?php if ( have_rows('subitem') ) : ?>
                                            <ul class="subitem">
                                                <?php while ( have_rows('subitem') ) : the_row();?>

                                                <li>
                                                    <a href="<?php echo esc_url(get_field('subitem_link')['url']);?>">
                                                        <?php if ( get_sub_field('subitem') ) : ?>
                                                            <?php echo get_sub_field('subitem'); ?>
                                                        <?php endif; ?> 
                                                    </a>
                                                </li>

                                                <?php endwhile; ?>
                                            </ul>
                                        <?php endif; ?>
                                    </li>
                            
                                <?php endwhile; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="item-card flex-wrapper">

                    <div class="image-section">

                        <?php if( have_rows('slider_images_section') ): ?>

                            <?php $slides = []; ?>
                            
                            <div class="big-image img">
                                <div class="slider-wrapper">
                                    <?php while( have_rows('slider_images_section') ): the_row(); 
                                        $img = get_sub_field('slider_img');
                                        if ($img):
                                            $slides[] = $img;
                                    ?>
                                        <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr($img['alt'] ?? ''); ?>">
                                    <?php endif; endwhile; ?>
                                </div>

                                <div class="shadow flex-wrapper">
                                    <span class="controls prev"><</span>
                                    <span class="controls next">></span>
                                </div>
                            </div>

                            <?php 
                            
                            if (!empty($slides)): 
                                foreach($slides as $index => $img): 
                            ?>
                                <div class="mini-image img">
                                    <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr($img['alt'] ?? ''); ?>">
                                    <div class="white-shadow<?php echo $index !== 0 ? ' active' : ''; ?>"></div>
                                </div>
                            <?php 
                                endforeach; 
                            endif; 
                            ?>

                        <?php endif; ?>


                    </div>

                    <div class="info-section flex-wrapper">
                        <div class="title">
                            <?php if ( get_field('item_title') ) : ?>
                                <p><?php echo get_field('item_title'); ?></p>
                            <?php endif; ?> 
                        </div>

                        <div class="text">
                            <?php if ( get_field('information') ) : ?>
                                <p><?php echo get_field('information'); ?></p>
                            <?php endif; ?> 
                        </div>

                        <div class="gorizontal-line"></div>


                        <?php if ( have_rows('icon_info') ) : ?>
                            <?php while ( have_rows('icon_info') ) : the_row();?>
                            <div class="icon flex-wrapper">
                                <div class="green-circle">
                                    <?php if ( get_sub_field('icon') ) : ?>
                                        <img 
                                            src="<?php echo esc_url(get_sub_field('icon')['url']); ?>" >
                                    <?php endif; ?>  
                                </div>

                                <div class="info">
                                    <div class="title">
                                        <?php if ( get_sub_field('title') ) : ?>
                                            <p><?php echo get_sub_field('title'); ?></p>
                                        <?php endif; ?> 
                                    </div>

                                    
                                    <?php if ( get_sub_field('info') ) : ?>
                                        <p class="text"><?php echo get_sub_field('info'); ?></p>
                                    <?php endif; ?> 
                                    
                                </div>
                            </div>
                                
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="green-border-container flex-wrapper">

                    <div class="title">
                        <?php if ( get_field('interesting_title') ) : ?>
                            <p><?php echo get_field('interesting_title'); ?></p>
                        <?php endif; ?> 
                    </div>

                    <div class="gallery flex-wrapper">

                        <div class="gallery-wrapper flex-wrapper">

                            <?php if ( have_rows('interesting_group') ) : ?>
                                <?php while ( have_rows('interesting_group') ) : the_row();?>
                                    <div class="item flex-wrapper">
                                        <div class="image">
                                            <?php if ( get_sub_field('image') ) : ?>
                                                <img 
                                                    src="<?php echo esc_url(get_sub_field('image')['url']); ?>" >
                                            <?php endif; ?>  
                                        </div>

                                        <div class="title">
                                            <?php if ( get_sub_field('title') ) : ?>
                                                <p><?php echo get_sub_field('title'); ?></p>
                                            <?php endif; ?> 
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    
        <?php get_template_part('footer'); ?>
    
    </div>  

    <?php wp_footer(); ?>
    
</body>
</html>