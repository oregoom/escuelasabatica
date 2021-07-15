<?php get_header(); ?>

<div class="d-none d-md-block container-fluid pb-0 text-center" id="img-bg-search">
    
    <div class="container">
    
        <h1 class="pt-5 pb-2 text-center text-white text-s"><strong>Buscar</strong></h1>

        <div class="ml-auto mr-auto mb-3" style="max-width: 70%;">
            <?php get_search_form(); ?>            
        </div>
        
        <div class="pb-3 h4 text-center border-bottom">Mostrando resultados para:<strong> <?php echo get_search_query(); ?> </strong></div>
    
    </div>
    
</div>

<div class="container bg-white pt-lg-5 pt-4 pb-5">
    
        <div class="row">
            
            <article class="col-xl-8 col-lg-7">
                
                <?php 

                if(have_posts()){ 

                    while(have_posts()) : the_post();

                        if(has_post_thumbnail()){ ?>

                            <div class="mb-4 card border-0">
                              <div class="row no-gutters">
                                <div class="col-sm-5">
                                    <a href="<?php echo the_permalink(); ?>"><img src="<?php the_post_thumbnail_url();?>" class="card-img"></a>
                                </div>
                                <div class="col-sm-7">
                                    <div class="card-body pt-sm-0 pl-sm-4 pt-3 pl-0 pr-0">
                                        <h3 class="card-title h5 mb-1" style="line-height: 1.3em; font-family: Raleway, sans-serif; font-weight: 700; color: #2a3b47;"><a href="<?php the_permalink(); ?>" class="text-dark"><?php the_title(); ?></a></h3>
                                        <?php //Funcion para extraer 100 caracteres
                                                hb_excerpt_100_caracteres(get_the_excerpt()); ?>
                                        <a class="mt-0" href="<?php the_permalink(); ?>"><small>Seguir leyendo</small></a>
                                    </div>
                                </div>
                              </div>
                            </div><?php                    
                        }

                    endwhile;
                    wp_reset_postdata(); 
                        
                }?>
                
            </article>  
            <aside class="col-xl-4 col-lg-5">   
                
                <div class="card shadow pb-4 pt-4 mb-4 d-none d-lg-block text-center" style="border: none; border-top: 3px solid #FA6002; background: rgba(250, 96, 2, 0.04);">
    
                    <!--//GOOGLE ADSENSE (Movil) -->
                    <?php if(get_option('template_oregoom_adsense_300_250') != ''){ ?>                
                        <div class="pb-4 text-center d-lg-none">

                            <?php  echo get_option('template_oregoom_adsense_300_250'); ?>

                        </div>                
                    <?php } ?>

                </div>  
                
            </aside>
            
        </div> 
    
</div>

<?php

get_footer();