<?php
/*
Template Name: Новини
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php wp_head(); ?>

    <title>News</title>
</head>
<body>
    <div class="news-all">

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
    
            <div class="header-background news" style = "background-image: url(<?php echo esc_url(get_field('header_image')['url'] ?? ''); ?>);">
                <div class="black-background"></div>
    
                <div class="text flex-wrapper">
                    <?php if ( get_field('top_page__title') ) : ?>
                        <p><?php echo get_field('top_page__title'); ?></p>
                    <?php endif; ?>

                    <div class="white-gorizontal"></div>
                </div>
            </div>
        </header>
    
        <div class="container flex-wrapper">
            <div class="number-date">
                <div class="number flex-wrapper">

                    <?php if ( get_field('events_page_link') ) : ?>
                        <a href="<?php echo esc_url(get_field('events_page_link')['url']);?>">
                            <?php if ( get_field('back_arrow') ) : ?>
                                <img 
                                    src="<?php echo esc_url(get_field('back_arrow')['url']); ?>">
                            <?php endif; ?>
                        </a>
                    <?php endif; ?>

                    <?php if ( get_field('top_page_title') ) : ?>
                        <p><?php echo get_field('top_page_title'); ?></p>
                    <?php endif; ?>
                </div>
    
                <div class="date">
                    <?php if ( get_field('news_date') ) : ?>
                        <span><?php echo get_field('news_date'); ?></span>
                    <?php endif; ?>
                </div>
            </div>
    
            <div class="gorizontal-line"></div>
    
            <div class="recipe">
                <?php if ( get_field('recipe') ) : ?>
                    <p><?php echo nl2br(get_field('recipe')); ?></p>
                <?php endif; ?>
            </div>
    
            <div class="ingridients-wrapper flex-wrapper">
                <div class="ingridients">
                    <?php if ( get_field('ingridients_title') ) : ?>
                        <span><?php echo get_field('ingridients_title'); ?></span>
                    <?php endif; ?>

                    <?php if ( have_rows('ingridients') ) : ?>
                        <ul>
                            <?php while ( have_rows('ingridients') ) : the_row(); ?>

                                <?php if ( get_sub_field('item') ) : ?>
                                    <li><?php echo (get_sub_field('item')); ?></li>
                                <?php endif; ?>
                    
                            <?php endwhile; ?>
                        </ul>
                    <?php endif; ?> 
                </div>
    
                <?php if ( get_field('header_image') ) : ?>
                    <img 
                        src="<?php echo esc_url(get_field('header_image')['url']); ?>">
                <?php endif; ?>
            </div>
        </div>
    
        <?php get_template_part('footer'); ?>
    
      
    </div>  

    <?php wp_footer(); ?>

</body>
</html>