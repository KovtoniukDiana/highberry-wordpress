<?php
/*
Template Name: Контакти
*/
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php wp_head(); ?>

    <title>Contacts</title>
</head>
<body>
    <div class="contacts-all">

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
    
    
        <div class="section grey-background flex-wrapper">
            <div class="grey-shadow-box flex-wrapper">
                <div class="content-container flex-wrapper">
                    <div class="grid-container min-1025">
                        
                        <?php if ( have_rows('contacts') ) : ?>
                            <?php while ( have_rows('contacts') ) : the_row();?>

                                <div class="icon">
                                    <div class="green-circle">
                                        <?php if ( get_sub_field('icon') ) : ?>
                                            <img 
                                                src="<?php echo esc_url(get_sub_field('icon')['url']); ?>" >
                                        <?php endif; ?>  
                                    </div>
                                </div>

                                <div class="info">
                                     <?php if ( get_sub_field('title') ) : ?>
                                        <div class="title">
                                            <?php echo get_sub_field('title'); ?>
                                        </div>
                                    <?php endif; ?> 
                                    
                                    <?php if ( get_sub_field('info') ) : ?>
                                        <span><?php echo nl2br(get_sub_field('info')); ?></span>
                                    <?php endif; ?> 
                                </div>
    
                            <?php endwhile; ?>
                        <?php endif; ?>

                    </div>

                    <div class="container max-1025">
                        <div class="title">
                            <?php if ( get_field('title_max_1024_first') ) : ?>
                                <p><?php echo get_field('title_max_1024_first'); ?></p>
                            <?php endif; ?> 
                        </div>

                        <div class="grid-container">

                            <div class="icon flex-wrapper">
                                <div class="green-circle">
                                    <?php if ( get_field('icon_tablet_location') ) : ?>
                                        <img 
                                            src="<?php echo esc_url(get_field('icon_tablet_location')['url']); ?>" >
                                    <?php endif; ?> 
                                </div>
                            </div>

                            <div class="info">
                                <?php if ( get_field('location_info') ) : ?>
                                    <span><?php echo nl2br(get_field('location_info')); ?></span>
                                <?php endif; ?> 
                            </div>

                            <div class="green-line"></div>
    
                            <div class="logo flex-wrapper">
                                <?php if ( get_field('red_mini_logo', 'option') ) : ?>
                                    <img 
                                        src="<?php echo esc_url(get_field('red_mini_logo', 'option')['url']); ?>">
                                <?php endif; ?>
                            </div>

                            <div class="icon flex-wrapper">
                                <div class="green-circle">
                                    <?php if ( get_field('tablet_email_icon') ) : ?>
                                        <img 
                                            src="<?php echo esc_url(get_field('tablet_email_icon')['url']); ?>" >
                                    <?php endif; ?> 
                                </div>
                            </div>

                            <div class="info">
                                <?php if ( get_field('email') ) : ?>
                                    <span><?php echo nl2br(get_field('email')); ?></span>
                                <?php endif; ?> 
                            </div>

                            <div class="title">
                                <?php if ( get_field('title_max_1024_second') ) : ?>
                                    <p><?php echo get_field('title_max_1024_second'); ?></p>
                                <?php endif; ?> 
                            </div>

                            <div class="icon phone-1 flex-wrapper">
                                <div class="green-circle">
                                    <?php if ( get_field('tablet_phone_icon') ) : ?>
                                        <img 
                                            src="<?php echo esc_url(get_field('tablet_phone_icon')['url']); ?>" >
                                    <?php endif; ?> 
                                </div>
                            </div>

                            <div class="info phone-1">
                                <?php if ( get_field('tablet_contacts_first') ) : ?>
                                    <span><?php echo nl2br(get_field('tablet_contacts_first')); ?></span>
                                <?php endif; ?> 
                            </div>

                            <div class="icon phone-2 flex-wrapper">
                                <div class="green-circle">
                                    <?php if ( get_field('tablet_phone_icon') ) : ?>
                                        <img 
                                            src="<?php echo esc_url(get_field('tablet_phone_icon')['url']); ?>" >
                                    <?php endif; ?> 
                                </div>
                            </div>

                            <div class="info phone-2">
                                <?php if ( get_field('tablet_contacts_second') ) : ?>
                                    <span><?php echo nl2br(get_field('tablet_contacts_second')); ?></span>
                                <?php endif; ?> 
                            </div>

                        </div>
                    </div>
    
                    <div class="green-line min-1025"></div>
    
                    <div class="logo min-1025">
                        <?php if ( get_field('red_mini_logo', 'option') ) : ?>
                            <img 
                                src="<?php echo esc_url(get_field('red_mini_logo', 'option')['url']); ?>">
                        <?php endif; ?>
                    </div>
                </div>
    
                <div class="form flex-wrapper">
                    
                    <?php if ( get_field('form_title') ) : ?>
                        <div class="title">
                            <?php echo nl2br(get_field('form_title')); ?>
                        </div>
                    <?php endif; ?>
                    
    
                    <div class="form-input flex-wrapper">

                        <div class="input flex-wrapper">
                            <?php if ( have_rows('input', 'option') ) : ?>
                                <?php while ( have_rows('input', 'option') ) : the_row(); ?>
                                    <input type="text" placeholder="<?php echo esc_attr( get_sub_field('input') ); ?>">   
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
    

                        <?php if ( get_field('mandatory_items', 'option') ) : ?>
                            <p class="text permission"><?php echo get_field('mandatory_items', 'option'); ?></p>
                        <?php endif; ?>
            
                        <div class="checkbox">
                            <label>
                                <?php if ( get_field('checkbox_allow', 'option') ) : ?>
                                    <input type="checkbox">
                                    <span class="text"><?php the_field('checkbox_allow', 'option'); ?></span>
                                <?php endif; ?>
                            </label>         
                        </div> 
            
                        <div class="button-send">
                            <button>
                                <?php if ( get_field('button_send_form', 'option') ) : ?>
                                    <?php the_field('button_send_form', 'option'); ?>
                                <?php endif; ?>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="map">
            <?php if ( get_field('europe_map') ) : ?>
                <img 
                    src="<?php echo esc_url(get_field('europe_map')['url']); ?>">
            <?php endif; ?>
        </div>
    
       <?php get_template_part('footer'); ?>
    
    </div>

    
    <?php wp_footer(); ?>

</body>
</html>