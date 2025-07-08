<?php
/*
Template Name: Виробництво
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php wp_head(); ?>

    <title>Production</title>
</head>
<body>
    <div class="production-all">

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
    
    
        <div class="frozing flex-wrapper">
            <div class="frozing-block">
                <div class="iqf-techtonogy grey-shadow-box">
                    <div class="image-block flex-wrapper">
                        <?php if ( get_field('dynamic_image') ) : ?>
                            <img 
                                src="<?php echo esc_url(get_field('dynamic_image')['url']); ?>">
                        <?php endif; ?>
                    </div>
    
                    <div class="text-block flex-wrapper">
                        <div class="title"> 
                            <p>
                                <?php if ( get_field('dynamic_title') ) : ?>
                                    <?php echo get_field('dynamic_title'); ?>
                                <?php endif; ?> 
                            </p>
                        </div>
            
                        <div class="gorizontal-line"></div>
            
                        <div class="information">
                            <p>
                                <?php if ( get_field('dynamic_information') ) : ?>
                                    <?php echo get_field('dynamic_information'); ?>
                                <?php endif; ?> 
                            </p>
                        </div>
                    </div>
                </div>
    
                <div class="static-frozing grey-shadow-box">
                    <div class="text-block flex-wrapper">
                        <div class="title"> 
                            <p>
                                <?php if ( get_field('static_title') ) : ?>
                                    <?php echo get_field('static_title'); ?>
                                <?php endif; ?> 
                            </p>
                        </div>
            
                        <div class="gorizontal-line"></div>
    
                        <div class="information">
                            <p>
                                <?php if ( get_field('static_information') ) : ?>
                                    <?php echo nl2br(esc_html(get_field('static_information'))); ?>
                                <?php endif; ?> 
                            </p>
                        </div>
                    </div>
    
                    <div class="image-block flex-wrapper">
                        <p>
                            <?php if ( get_field('static_image_title') ) : ?>
                                <?php echo get_field('static_image_title'); ?>
                            <?php endif; ?> 
                        </p>

                        <?php if ( get_field('static_image') ) : ?>
                            <img 
                                src="<?php echo esc_url(get_field('static_image')['url']); ?>">
                        <?php endif; ?>

                        <div class="blue-item"></div>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="frozing-processes flex-wrapper">
            <div class="title">
                <p>
                    <?php if ( get_field('process_title') ) : ?>
                        <?php echo nl2br(esc_html(get_field('process_title'))); ?>
                    <?php endif; ?> 
                </p>
            </div>
    
            <div class="fabric-image">
                <?php if ( get_field('factory_image') ) : ?>
                    <img 
                        src="<?php echo esc_url(get_field('factory_image')['url']); ?>" >
                <?php endif; ?>
            </div>
    


            <?php if ( have_rows('grid_process') ) : ?>
                <div class="fabric-grid green-border-item">
                        <?php $i = 0;
                        while ( have_rows('grid_process') ) : the_row(); 

                            $i++;
                            $image = get_sub_field('image');
                            $icon = get_sub_field('icon');
                            $title = get_sub_field('title');
                            $text = get_sub_field('information');
                            $position = get_sub_field('image_position');
                        ?>

                        <?php if ($i === 1):?>
                            <div class="green-divider flex-wrapper">
                                <?php for ($x = 0; $x < 4; $x++): ?>
                                    <img src="<?= get_template_directory_uri(); ?>/assets/img/production/grid-fabric-divider.png" alt="">
                                <?php endfor; ?>
                            </div>
                        <?php endif; ?>

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
        

        </div>
    
        <div class="map-section flex-wrapper">
            <?php if ( get_field('export_map', 'option') ) : ?>
                <img 
                    src="<?php echo esc_url(get_field('export_map', 'option')['url']); ?>">
            <?php endif; ?>
        </div>
    
        <?php get_template_part('footer'); ?>
    
    </div>
    
    
    <?php wp_footer(); ?>
    
</body>
</html>