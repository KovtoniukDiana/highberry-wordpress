

<?php if ( get_field('footer_background_image', 'option') ) : ?>
    <footer style="background-image: url('<?php echo esc_url(get_field('footer_background_image', 'option')['url']); ?>');" >
        <div class="gradient-div">
            <div class="content-container">
                <div class="gorizontal-content">
                    <div class="logo-wrapper">
                        <?php if ( get_field('footer_logo_img', 'option') ) : ?>
                            <img 
                                class="company-logo-second" 
                                src="<?php echo esc_url(get_field('footer_logo_img', 'option')['url']); ?>" 
                                alt="<?php echo esc_attr(get_field('footer_logo_img', 'option')['alt'] ?: 'footer_logo_img'); ?>">
                        <?php endif; ?>
                    </div>
    
                    <div class="form">
                        <div class="input">

                            <?php if ( have_rows('input', 'option') ) : ?>
                                <?php while ( have_rows('input', 'option') ) : the_row(); ?>
                                    <input type="text" placeholder="<?php echo esc_attr( get_sub_field('input') ); ?>">   
                                <?php endwhile; ?>
                            <?php endif; ?>

                        </div>

                        <?php if ( get_field('mandatory_items', 'option') ) : ?>
                            <p><?php the_field('mandatory_items', 'option'); ?></p>
                        <?php endif; ?>
    
                        <div class="checkbox">
                            <label>
                                <?php if ( get_field('checkbox_allow', 'option') ) : ?>
                                    <input type="checkbox">
                                    <?php the_field('checkbox_allow', 'option'); ?>
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
    
                <div class="contacts-container">
                    <div class="first-row">
                        <?php if ( get_field('company_name', 'option') && get_field('company_address', 'option') ) : ?>
                            <p class="company-name"><?php the_field('company_name', 'option'); ?>
                                <p class="address tablet"><?php the_field('company_address', 'option'); ?></p>
                            </p>
                        <?php endif; ?>

                    </div>
                    
                    <div class="second-row">
                        <?php if ( get_field('company_address', 'option') ) : ?>
                            <p class="address laptop"><?php the_field('company_address', 'option'); ?></p>
                        <?php endif; ?>
                
                        <?php if ( have_rows('columns', 'option') ) : ?>
                            <?php $column_index = 0; ?>
                            <?php while ( have_rows('columns', 'option') ) : the_row(); $column_index++; ?>
                                <div class="column-link<?php echo $column_index === 4 ? ' numbers' : ''; ?>">
                                    <?php if ( have_rows('link_column', 'option') ) : ?>
                                        <?php while ( have_rows('link_column', 'option') ) : the_row(); ?>
                
                                            <?php if ( get_sub_field('link_text') && get_sub_field('link_text')) : ?>
                                                <a  href="<?php echo esc_url(get_sub_field('link_url')['url']);?>">
    
                                                        <?php echo esc_html(get_sub_field('link_text'));?>
                                                    
                                                </a>
                                            <?php endif; ?>

                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
    
                    <div class="third-row">
                        <div class="catalog-pdf">
                            
                            <?php if ( get_field('catalog_text_footer', 'option') ) : ?>
                                <a class="link" href="#catalog-pdf"><?php the_field('catalog_text_footer', 'option'); ?></a>
                            <?php endif; ?>
                            
                            <?php if ( get_field('catalog_img_footer', 'option') ) : ?>
                                <img 
                                    class="pdf-image" 
                                    src="<?php echo esc_url(get_field('catalog_img_footer', 'option')['url']); ?>">
                            <?php endif; ?>
                        </div>
                        
                        <div class="icon-post">
                            <?php 
                                $icons = get_field('icons', 'option');
                                if ( $icons ) : ?>
                                    <div class="icons">
                                        <?php foreach ( $icons as $icon ) : 
                                            $url = $icon['icon_url'];
                                            $class = $icon['icon'];
                                        ?>
                                            <a href="<?php echo esc_url($url); ?>">
                                                <i class="<?php echo esc_attr($class); ?>"></i>
                                            </a>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>

    
                            <?php if ( get_field('company_email', 'option') ) : ?>
                                <a href="#catalog-pdf"><?php the_field('company_email', 'option'); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="footer">
                <div class="content-footer"> 
                    <?php if ( get_field('copyright', 'option') ) : ?>
                        <a><?php the_field('company_email', 'option'); ?></a>
                    <?php endif; ?>
    
                    <?php if ( get_field('privacy_policy', 'option') ) : ?>
                        <a><?php the_field('privacy_policy', 'option'); ?></a>
                    <?php endif; ?>
                </div>
                    
            </div>
        </div>
    </footer>
<?php endif; ?>

