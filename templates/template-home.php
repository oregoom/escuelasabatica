<?php
/*
 * Template name: Página de Inicio
 * Template Post Type: page
 */

get_header();

if(have_posts()){
    
    while(have_posts()) : the_post(); ?>




<main>
    <article>        
        
        <section class="container pt-3 pt-md-5 pb-3">
            
            <h1 class="pb-2 text-center" style="font-family: 'Salsa'; font-weight: 600; font-size: 50px;"><span style="color: #f76300;">Escuela</span> Sabática<?php // the_title(); ?></h1>
                        
            <div class="text-center">
                
                <!--//GOOGLE ADSENSE 728x90 (PC) -->
                <?php if(get_option('template_oregoom_adsense_728_90') != ''){ ?>                
                    <div class="text-center d-none d-lg-block">                        
                        <?php echo get_option('template_oregoom_adsense_728_90'); ?>                        
                    </div>                
                <?php } ?>
                
            </div>
            
            <div class="mt-2 mt-lg-4 text-center">
                
                <!--//DIV para (PC) -->
                <div class="d-none d-lg-block">
                    
                    <h2>Guía de estudio de la Biblia</h2>
                
                    <p>La <strong>Escuela Sabática</strong> es el principal sistema de educación religiosa de la Iglesia, y tiene cuatro propósitos: el estudio de las escrituras, la confraternización, compartir la fe con la comunidad y dar énfasis a la misión mundial de la iglesia (<em>Manual de la Iglesia, p. 93</em>).</p>
                
                </div>
                
                <p>A continuación, las <em>Guías de Estudio de la Biblia para la Escuela Sabática <?php echo  Date('Y'); ?></em>:</p>

            </div>
            
        </section>
        
        
        <section class="pt-1 pt-lg-4 pb-lg-4">
            
            <div class="container">
                
                <div class="row">

                    <?php            
                    $NOT_page[] = get_the_ID();
                    $query_home_hb = new WP_Query( array (
                            'post_type' => 'page',
                            'post_status' => 'publish',
                            'order'   => 'DESC',
                            'post__not_in' => $NOT_page,
                            'posts_per_page' => -0
                            ));            
                    
                    
                    
                    
                    ?>

                    <?php if($query_home_hb->have_posts()){ ?>

                    <?php while($query_home_hb->have_posts()) : $query_home_hb->the_post(); ?>
                    
                        <div class="col-xl-3 col-lg-4 col-6 mb-4">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('post-thumbnail', ['class' => 'img-fluid rounded-top shadow']); ?>
                                <!--<img class="rounded-top img-fluid" src="https://historiasdelabiblia.org/wp-content/uploads/2020/06/historia-del-arca-noe.jpg">-->
                            </a>

                            <div class="pt-3 text-center" style="line-height: 1em; font-family: Raleway, sans-serif;">
                                <small class="h5 text-dark"><?php the_title(); ?></small>
                            </div>
                            
                            <p class="pt-2 text-center h6"><strong><?php echo get_post_meta(get_the_ID(), 'periodo_de_guia_de_estudio_de_la_biblia', true); ?></strong></p>
                            
                            <div class="pb-3 text-center" style="line-height: 1em; font-family: Raleway, sans-serif;">
                                <a href="<?php the_permalink(); ?>" class="h4">
                                    <small>Entrar ahora</small>
                                </a>
                            </div>
                        </div>

                    <?php endwhile; ?> 

                    <?php wp_reset_postdata(); ?>      

                    <?php } ?>

                </div>
            
            </div>
                        
        </section>
        
        
                
        
        <section class="container">
            
            <!--//DIV para (Movil) -->
            <div class="d-lg-none text-center">
                    
                <h2 class="pb-2">Guía de estudio de la Biblia</h2>

                <p>La <strong>Escuela Sabática</strong> es el principal sistema de educación religiosa de la Iglesia, y tiene cuatro propósitos: el estudio de las escrituras, la confraternización, compartir la fe con la comunidad y dar énfasis a la misión mundial de la iglesia (<em>Manual de la Iglesia, p. 93</em>).</p>

            </div>
            
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