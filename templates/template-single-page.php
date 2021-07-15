<?php
/*
 * Template name: Single Page
 * Template Post Type: page
 */

get_header() ?>

<?php 

if(have_posts()){
    
    while(have_posts()) : the_post(); ?>   

<div class="d-none d-lg-block container-fluid pb-0 mb-0">
    
    <nav aria-label="breadcrumb" class="container d-none d-lg-block">
        <ol class="breadcrumb pl-0 pr-0 mb-0" style="background: #ffffff; font-size: 13px;">
            <li class="breadcrumb-item"><a href="<?php echo esc_url(home_url()); ?>">Inicio</a></li>                                
            <li class="breadcrumb-item active text-dark" aria-current="page"><?php the_title(); ?></li>
        </ol>
    </nav>
    
</div>













<!-- Vídeo de HISTORIAS DE LA BIBLIA (Movil) -->
<?php if(get_post_meta(get_the_ID(), 'hb_idyoutube_page', true)){ ?>
    <div class="d-lg-none sticky-top">
        <amp-youtube
            data-videoid="<?php echo get_post_meta(get_the_ID(), 'hb_idyoutube_page', true); ?>"
            layout="responsive"
            width="480"
            height="270"
          ></amp-youtube>
    </div>
<?php } ?>
 
  <!-- COMPARTIR en Redes Sociales -->
<div class="container d-lg-none mt-1">
    <div class="d-flex align-items-center border-bottom">    
        <span class="mr-2">
            Compartir<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-bar-right" viewBox="0 0 16 20">
                <path fill-rule="evenodd" d="M6 8a.5.5 0 0 0 .5.5h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L12.293 7.5H6.5A.5.5 0 0 0 6 8zm-2.5 7a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5z"/>
              </svg>
        </span>

        <span class="mr-2">
            <amp-social-share class="rounded" type="facebook" data-param-app_id="216472885737679" width="25" height="25"></amp-social-share>
        </span>
        
        <span class="mr-2">
            <amp-social-share class="rounded"  aria-label="Share by email" type="email"  width="25" height="25"></amp-social-share>
        </span>
        
        <span class="mr-2">
            <amp-social-share class="rounded"  aria-label="Share on LinkedIn"  type="linkedin"  width="25"  height="25"></amp-social-share>
        </span>

        <span class="mr-2">
            <amp-social-share class="rounded" type="twitter" width="25" height="25"></amp-social-share>
        </span>

        <span class="mr-2">
            <amp-social-share class="rounded" type="whatsapp" width="25" height="25"></amp-social-share>
        </span>  
        
    </div>
</div>
 
 

<div class="container bg-white pb-5">     
        <div class="row">
            
            <article class="col-xl-8 col-lg-7">
                
                
                <!-- Vídeo de HISTORIAS DE LA BIBLIA (Escritorio) -->
                <?php if(get_post_meta(get_the_ID(), 'hb_idyoutube_page', true)){ ?>
                    <div class="d-none d-lg-block">
                        <amp-youtube
                            data-videoid="<?php echo get_post_meta(get_the_ID(), 'hb_idyoutube_page', true); ?>"
                            layout="responsive"
                            width="480"
                            height="270"
                          ></amp-youtube>
                    </div>
                <?php } else { 
                
                the_post_thumbnail('post-thumbnail', ['class' => 'img-fluid']);
                                
                 } ?>
                
                
                
                
                <!-- Google AdSense 728x90 --->
                <?php // if(get_option('template_oregoom_adsense_728_90') != ''){ ?>
                <!--<div class="shadow d-none d-xl-block text-center bg-dark" style="border-bottom: 1px solid #343a40;">-->

                        <?php // echo get_option('template_oregoom_adsense_728_90'); ?>

                    <!--</div>-->
                <?php // } ?>
                
                
                <!-- COMPARTIR en Redes Sociales -->
                <div class="d-none mt-2 d-lg-block ">
                    <div class="pb-1 d-flex align-items-center border-bottom">    
                        <span class="mr-2">
                            <strong>Comparte con tus amigos</strong><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-bar-right" viewBox="0 0 16 20">
                                <path fill-rule="evenodd" d="M6 8a.5.5 0 0 0 .5.5h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L12.293 7.5H6.5A.5.5 0 0 0 6 8zm-2.5 7a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5z"/>
                              </svg>
                        </span>

                        <span class="mr-2">
                            <amp-social-share class="rounded" type="facebook" data-param-app_id="216472885737679" width="36" height="36"></amp-social-share>
                        </span>

                        <span class="mr-2">
                            <amp-social-share class="rounded"  aria-label="Share by email" type="email"  width="36" height="36"></amp-social-share>
                        </span>

                        <span class="mr-2">
                            <amp-social-share class="rounded"  aria-label="Share on LinkedIn"  type="linkedin"  width="36"  height="36"></amp-social-share>
                        </span>

                        <span class="mr-2">
                            <amp-social-share class="rounded" type="twitter" width="36" height="36"></amp-social-share>
                        </span>

                        <span class="mr-2">
                            <amp-social-share class="rounded" type="whatsapp" width="36" height="36"></amp-social-share>
                        </span>     
                    </div>
                </div>
                
                <h1 class="pb-4 mt-lg-5 mt-4 h2 text-lg-left text-center"><strong> <?php the_title(); ?> </strong></h1>
                
                
                <!--//GOOGLE ADSENSE (Movil) -->
                <?php if(get_option('template_oregoom_adsense_300_250') != ''){ ?>                
                    <div class="pb-4 text-center d-lg-none">
                        
                        <?php  echo get_option('template_oregoom_adsense_300_250'); ?>
                        
                    </div>                
                <?php } ?>
                    
                
                
                <?php the_content(); ?>     
                
                
                
                <h3 class="pt-2 h4" style="font-family: Raleway, sans-serif;">
                    <strong>Más historias</strong>
                </h3>
                
                <div class="row pt-3 pb-3">

                    <?php 
                    //Post que no deben de mostrar en la consulta
                    $NOT_post[] = get_the_ID();

                    //Consulta general
                    $hb_query_2 = new WP_Query( array( 
                            'orderby' => 'rand',
                            'post_status' => 'publish',
                            'posts_per_page' => 6,
                            'post__not_in' => $NOT_post
                        ));   

                    while ($hb_query_2->have_posts()) : $hb_query_2->the_post(); 

                        if(has_post_thumbnail()){ ?>

                        <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 pb-3">
                            <a class="text-dark" href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?><h3 class="h6 pt-2" style="font-family: Raleway, sans-serif;"><strong><?php the_title(); ?></strong></h3></a>
                        </div>

                        <?php }                    

                    endwhile;

                    $hb_query_2->reset_postdata(); ?>

                </div>
                
            </article>  
            <aside class="col-xl-4 col-lg-5">            
                <?php get_sidebar();?>            
            </aside>
            
        </div>   
    
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