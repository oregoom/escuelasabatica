<?php
/*
 * Template name: Antiguo & Nuevo Testamento
 * Template Post Type: page
 */

get_header();

if(have_posts()){
    
    while(have_posts()) : the_post(); ?>   

<div class="d-none d-lg-block container-fluid pb-0 mb-0" id="img-bg-page">
    <nav aria-label="breadcrumb" class="container d-none d-lg-block pt-4">
        <ol class="breadcrumb rounded-pill" style="background: rgba(0, 0, 0, 0.3);">
            <li class="breadcrumb-item"><a class="text-warning" href="<?php echo esc_url(home_url()); ?>">Inicio</a></li>                                
            <li class="breadcrumb-item active text-white" aria-current="page"><?php the_title(); ?></li>
        </ol>
    </nav>
    
</div>

<div class="container bg-white pt-lg-5 pt-4 pb-5 mt-lg-n5" style="border-top-left-radius: 30px; border-top-right-radius: 30px;">
    
    <article class="container">
                       
                
        <!--//GOOGLE ADSENSE 728x90 (PC) -->
        <?php if(get_option('template_oregoom_adsense_728_90') != ''){ ?>   

            <div class="mb-4 mb-lg-5 text-center d-none d-lg-block">                        
                <?php echo get_option('template_oregoom_adsense_728_90'); ?>                        
            </div> 

        <?php } ?>
            
        
        
        <h1 class="pb-2 text-center" style="font-family: 'Salsa'; font-size: 40px;"><strong><?php the_title(); ?></strong></h1>
        
        
        <!--//GOOGLE ADSENSE 300x250 (Movil) -->
        <?php if(get_option('template_oregoom_adsense_300_250') != ''){ ?>                
            <div class="text-center d-lg-none">                        
                <?php  echo get_option('template_oregoom_adsense_300_250'); ?>                        
            </div>                
        <?php } ?>
        
        
        
        <div class="pt-4 pb-5">
            
            <?php the_content(); ?>
            
        </div>  

    </article>
    
</div>

    <?php
    
    endwhile;
    wp_reset_postdata();    
} ?>



<?php

/*
 * ===============================
 * Pie de página 
 */
get_footer();
                
// if ( has_post_thumbnail() ) { the_post_thumbnail(); }
            
 
