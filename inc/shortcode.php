<?php
if( ! defined('ABSPATH')) exit;

/*
 * Crea un Shortcode [Historias más leidas]
 */

function hb_shortcode_history_home_leidas(){
    
    ob_start ();
    
    ?>

    <h2 class="h4 mb-4 pb-2 pt-4 border-bottom" style="line-height: 1em; font-family: Raleway, sans-serif; font-weight: 700;">Historias Biblicas mas leidas</h2>
    <div class="row mb-4">
       
       <?php    
        
        $shortcode_query = new WP_Query( array(
                            'post_type' => 'post',
                            'order'   => 'DESC',
                            'posts_per_page' => 4,
                            'post_status' => 'publish'
                            ));

        if($shortcode_query->have_posts()){

            while($shortcode_query->have_posts()) : $shortcode_query->the_post();

                if(has_post_thumbnail()){ ?>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-2">
                
                <div class="mb-3 card border-0 bg-white">

                    <a href="<?php echo the_permalink(); ?>"><img src="<?php the_post_thumbnail_url();?>" class="rounded-top"></a>

                    <div class="card-body pt-lg-2 pt-2 p-0">
                        <h5 class="card-title h5 pt-0" style="line-height: 1em; font-family: Raleway, sans-serif; font-weight: 700;">
                            <a href="<?php the_permalink(); ?>" class="text-dark"><small><strong><?php the_title(); ?></strong></small></a>
                        </h5>                        
                    </div>

                </div>
            </div><?php }

            endwhile;
            $shortcode_query->reset_postdata();                 
        }
    ?></div><?php
    
    return ob_get_clean ();
    
}
add_shortcode('hb-shortcode-history-home-leidas', 'hb_shortcode_history_home_leidas');



/*
 * Crea un Shortcode
 */

function hb_shortcode_history_home( $history ){
    
    ob_start ();
    
    $history = $history['id_page'];
    
    $id_pages = explode(",", $history);

   ?><div class="row"><?php
    
    for($i=0;$i<count($id_pages);$i++){
        
        $shortcode_query = new WP_Query( array(
                                        'page_id' => $id_pages[$i]
        ));

        if($shortcode_query->have_posts()){

            while($shortcode_query->have_posts()) : $shortcode_query->the_post();

                if(has_post_thumbnail()){ ?>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-4">
                <div class="mb-3 card border-0 shadow-sm text-center">

                    <a href="<?php echo the_permalink(); ?>"><img src="<?php the_post_thumbnail_url();?>" class="rounded-top"></a>

                    <div class="card-body pt-lg-3 pt-2">
                        <h4 class="card-title h5 mb-2" style="line-height: 1.3em; font-family: Raleway, sans-serif; font-weight: 700; color: #2a3b47;">
                            <a href="<?php the_permalink(); ?>" class="text-dark"><?php the_title(); ?></a>
                        </h4>
                        
                        <?php //Funcion para extraer 100 caracteres
                              hb_excerpt_100_caracteres(get_the_excerpt()); ?>
                        
                    </div>

                </div>
            </div><?php }

            endwhile;
            $shortcode_query->reset_postdata();                 
        }
    }
    ?></div><?php
    
    return ob_get_clean ();
    
}
add_shortcode('hb-shortcode-history-home', 'hb_shortcode_history_home');




/*
 * =================================================================================
 * Shortcode para mostrar historias del Antiguo Testamento(AT) y Nuevo Testamento(NT)
 */
function hb_shortcode_at_nt( $atnt ){ 
    
    ob_start ();
	
    $shortcode_query = new WP_Query( array(
                                    'meta_value' => $atnt['atnt'],
                                    'post_type'  => 'page',
                                    'order'   => 'DESC',
                                    'posts_per_page' => 200,
                                    'post_status' => 'publish',
                            ));
    
        if($shortcode_query->have_posts()){ ?>
        
            <div class="row"><?php
                
                while($shortcode_query->have_posts()) : $shortcode_query->the_post();

                    if(has_post_thumbnail()){ ?>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="mb-5 card border-0 shadow-sm">

                        <a href="<?php echo the_permalink(); ?>"><img src="<?php the_post_thumbnail_url('medium');?>" class="rounded-top"></a>

                        <div class="card-body pt-lg-3 pt-2">
                            <h4 class="card-title h5 mb-2" style="line-height: 1.3em; font-family: Raleway, sans-serif; font-weight: 700; color: #2a3b47;">
                                <a href="<?php the_permalink(); ?>" class="text-dark"><?php the_title(); ?></a>
                            </h4>
                            
                            <?php //Funcion para extraer 100 caracteres
                                    hb_excerpt_100_caracteres(get_the_excerpt()); ?>
                        </div>

                    </div>
                </div><?php }

                endwhile;
                $shortcode_query->reset_postdata(); 
                ?>
            </div><?php
        }
    
    return ob_get_clean ();
    
}
add_shortcode('hb-shortcode-at-nt', 'hb_shortcode_at_nt');


/*
 * =================================================================================
 * Shortcode para mostrar historias de Cada Personajes Bíblico del AT
 */
function id_hb_shortcode_per_at($ID_Cat){ 
    
    ob_start ();


    $count_historias_page = 1;

        $shortcode_query = new WP_Query( array(
                                        'cat' => $ID_Cat['id_cat'],
                                        'order'   => 'ASC',
                                        'posts_per_page' => 200
        ));

        if($shortcode_query->have_posts()){ ?>

    <div class="pt-5 border-top"><?php

        while($shortcode_query->have_posts()) : $shortcode_query->the_post();

            if(has_post_thumbnail()){ ?>

                <div class="mb-4 card border-0">
                  <div class="row no-gutters">
                    <div class="col-lg-4 col-sm-4">
                        <a href="<?php echo the_permalink(); ?>"><img src="<?php the_post_thumbnail_url();?>" class="card-img"></a>
                    </div>
                    <div class="col-lg-8 col-sm-8">
                        <div class="card-body pt-sm-0 pl-sm-4 pt-3 pl-0 pr-0">
                            <p class="text-muted m-0">HISTORIA <?php echo $count_historias_page++; ?></p>
                            <h5 class="card-title h5 mb-1" style="line-height: 1.3em; font-family: Raleway, sans-serif; font-weight: 700; color: #2a3b47;"><a href="<?php the_permalink(); ?>" class="text-dark"><?php the_title(); ?></a></h5>
                            <?php //Funcion para extraer 100 caracteres
                                    hb_excerpt_100_caracteres(get_the_excerpt()); ?>
                            <a class="mt-0" href="<?php the_permalink(); ?>"><small>Seguir leyendo</small></a>
                        </div>
                    </div>
                  </div>
                </div><?php                    
            }

        endwhile;
        $shortcode_query->reset_postdata();?>

    </div><?php

        }
    
    return ob_get_clean ();
    
}
add_shortcode('id_hb_shortcode_per_at', 'id_hb_shortcode_per_at');