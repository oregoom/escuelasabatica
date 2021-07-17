<?php

get_header();

if(have_posts()){
    
    while(have_posts()) : the_post();  ?>

<div class="d-none d-lg-block container-fluid pb-0 mb-0">
    
    <nav aria-label="breadcrumb" class="container d-none d-lg-block">
        <ol class="breadcrumb pl-0 pr-0 mb-0" style="background: #ffffff; font-size: 13px;">
            <li class="breadcrumb-item"><a href="<?php echo esc_url('https://historiasdelabiblia.org'); ?>" target="_blank">Inicio</a></li>
            <li class="breadcrumb-item"><a href="<?php echo esc_url(home_url()); ?>">Escuela Sabática</a></li>
            <li class="breadcrumb-item active text-dark" aria-current="page"><?php the_title(); ?></li>            
        </ol>
    </nav>
    
</div>


<main>
    <article>        
        
        <section class="container pt-2 pb-4">
            
            <div class="text-center">
                
                <!--//GOOGLE ADSENSE 728x90 (PC) -->
                <?php if(get_option('template_oregoom_adsense_728_90') != ''){ ?>                
                    <div class="text-center d-none d-lg-block">                        
                        <?php echo get_option('template_oregoom_adsense_728_90'); ?>                        
                    </div>                
                <?php } ?>
                
                <!--//GOOGLE ADSENSE 300x250 (Movil) -->
                <?php if(get_option('template_oregoom_adsense_300_250') != ''){ ?>                
                    <div class="text-center d-lg-none">                        
                        <?php  echo get_option('template_oregoom_adsense_300_250'); ?>                        
                    </div>                
                <?php } ?>
                
            </div>
            
            <h1 class="mt-4 text-center" style="font-family: 'Salsa'; font-weight: 600; font-size: 50px;"><?php the_title(); ?></h1>
            
            <div class="mt-2 text-center">
                
                <h2><span class="h3">Guía de estudio de la Biblia</span></h2>
                
                <p><strong><?php echo get_post_meta(get_the_ID(), 'periodo_de_guia_de_estudio_de_la_biblia', true); ?></strong></p>

            </div>
            
        </section>
        
        
        <section class="pt-1 pt-lg-4 pb-lg-4">
            
            <div class="container">
                
                <div class="row">
                    
                    <div class="col-lg-4 col-md-4 pb-4">
                        
                        <?php the_post_thumbnail('post-thumbnail', ['class' => 'img-fluid rounded-top shadow']); ?>
                        
                    </div>
                    
                    <div class="col-lg-8 col-md-8">
                        
                        <h2>Contenido</h2>
                        
                        <ol>
                            <?php                          
                            
                            
                            $ID_page[] = get_the_ID();
                            
                            $query_home_hb = new WP_Query( array (
                                    'post_type' => 'post',
                                    'post_status' => 'publish',
                                    'order'   => 'ASC',
                                    'meta_query' => array(
                                        array(
                                            'key'   => 'leccion_page',
                                            'value' => $ID_page,
                                        ),
                                    ),
                                    'posts_per_page' => -0
                                    ));            
                            ?>

                            <?php if($query_home_hb->have_posts()){ ?>

                                <?php while($query_home_hb->have_posts()) : $query_home_hb->the_post();
                                
                                $title_post_leccion = get_the_title();
                                                                
                                $fecha_inicio = get_post_meta(get_the_ID(), 'fecha_inicio', true);
                                $year = substr($fecha_inicio, 0, -4);
                                $mes = substr($fecha_inicio, 4, -2);
                                $dia = substr($fecha_inicio, 6);
                                
//                                $fecha_inicio = "$dia/$mes/$year";
                                
                                $fecha_final = get_post_meta(get_the_ID(), 'fecha_final', true);
                                $year = substr($fecha_final, 0, -4);
                                $mes = substr($fecha_final, 4, -2);
                                $dia = substr($fecha_final, 6);
                                
//                                $fecha_final = "$dia/$mes/$year";    
                                                                                                
                                if( (Date("Ymd") >= $fecha_inicio) && (Date("Ymd") <= $fecha_final) ) {
                                                                        
                                    $wp_query_post = new WP_Query( array (
                                            'post_type' => 'post',
                                            'post_status' => 'publish',
                                            'meta_key'   => 'fecha_leccion',
                                            'meta_value' => date("Ymd"), //Fecha presente, si no cumple... no imprime en contenido
                                            'posts_per_page' => -0
                                    ));
                                                                        
                                    if($wp_query_post->have_posts()){
                                        
                                        while ($wp_query_post->have_posts()) : $wp_query_post->the_post();                                                                                 
                                        
                                            $day_leccion = get_post_meta(get_the_ID(), 'dia_nombre_leccion', true); 

                                            if( $day_leccion == "Saturday") { ?>

                                                <li class="h5 pt-2 pb-1 border-top">
                                                    <a style="line-height: 1em; font-family: Raleway, sans-serif;" href="<?php the_permalink(); ?>" class="h4 text-danger">
                                                        <small><?php echo $title_post_leccion; ?></small>
                                                    </a>
                                                </li> <?php
                                            
                                            }

                                        endwhile;
                                        
                                    }
                                    // Resetear Post Data 
                                    wp_reset_postdata();                                     
                                    
                                    
                                } else {
                                                                        
                                    if ( Date("Ymd") < $fecha_final ) { ?>

                                        <li class="h5 pt-2 pb-1 border-top">
                                            <span class="h4 text-dark" style="line-height: 1em; font-family: Raleway, sans-serif;">
                                                <small><?php the_title(); ?></small>
                                            </span>                                        
                                        </li><?php
                                    
                                    } else { ?>

                                        <li class="h5 pt-2 pb-1 border-top">
                                            <a style="line-height: 1em; font-family: Raleway, sans-serif;" href="<?php the_permalink(); ?>" class="h4">
                                                <small><?php the_title(); ?></small>
                                            </a>
                                        </li><?php                                
                                        
                                    }
                                    
                                }
                                
                                ?>

                                <?php endwhile; ?> 
                                
                                <?php  // Resetear Post Data 
                                        wp_reset_postdata(); ?>  

                            <?php } ?>                        

                        </ol>
                        
                    </div>

                </div>
            
            </div>
                        
        </section>
        
        
                
        
        <section class="container">
            
            <h2 class="h4 pt-4 pb-2 mb-3 text-center" style="color: #FD6003; border-bottom: 1px solid #FD6003; font-weight: 400!important; font-size: 24px!important; font-family: 'Lobster',cursive!important;">Comparte con tus amigos</h2>
            
            <div class="pb-4 text-center">    
                <span class="mr-2">
                    <amp-social-share class="rounded" type="facebook" data-param-app_id="216472885737679" width="36" height="36"></amp-social-share>
                </span>

                <span class="mr-2">
                    <amp-social-share class="rounded" type="twitter" width="36" height="36"></amp-social-share>
                </span>

                <span class="mr-2">
                    <amp-social-share class="rounded" type="whatsapp" width="36" height="36"></amp-social-share>
                </span>    
            </div>
            
        </section>
        
        
        <section class="container">
            
            <!--//GOOGLE ADSENSE (PC) -->
           <?php if(get_option('template_oregoom_adsense_970_250') != ''){ ?>                
               <div class="pb-3 pt-3 text-center d-none d-lg-block">

                   <?php  echo get_option('template_oregoom_adsense_970_250'); ?>

               </div>                
           <?php } ?>

           <!--//GOOGLE ADSENSE (Movil) -->
           <?php if(get_option('template_oregoom_adsense_auto') != ''){ ?>                
               <div class="pb-3 pt-3 d-lg-none text-center">

                   <?php  echo get_option('template_oregoom_adsense_auto'); ?>

               </div>                
           <?php } ?>
                
            
        </section>
            
        
        
        
        <section class="container pt-5 pb-5 mb-5">
            
            <?php the_content(); ?>
            
        </section>
        
        
        
        
    </article>    
    
</main><?php
    
    endwhile;
    wp_reset_postdata();    
} ?>



<?php

/*
 * ===============================
 * Pie de página 
 */
get_footer();