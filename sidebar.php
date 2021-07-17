<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>


<!--Videos de cada día-->




<!--Los videos de la semana-->


<?php


function get_videos_de_youtube($id_post_sabado){    
        
    if( get_post_meta($id_post_sabado, 'alejandro_bullon', true) ){ 
        
        $ID_YouTube = get_post_meta($id_post_sabado, 'alejandro_bullon', true); 
        
        get_amp_lightbox_youtube($ID_YouTube); 
        
    }
    
    if( get_post_meta($id_post_sabado, 'escuela_sabatica_2000', true) ){ 
        
        $ID_YouTube = get_post_meta($id_post_sabado, 'escuela_sabatica_2000', true); 
        
        get_amp_lightbox_youtube($ID_YouTube); 
        
    }
    
    if( get_post_meta($id_post_sabado, 'bosquejo_de_la_leccion', true) ){ 
        
        $ID_YouTube = get_post_meta($id_post_sabado, 'bosquejo_de_la_leccion', true); 
        
        get_amp_lightbox_youtube($ID_YouTube); 
        
    }
    
}



/*
 * FUNCIÓN para AMP-LIGHTBOX
 */
function get_amp_lightbox_youtube($ID_YouTube){ ?>
    
    <amp-lightbox id="my-lightbox-<?php echo $ID_YouTube; ?>" layout="nodisplay">
        <div class="lightbox" tabindex="0">

             <!-- Vídeo de YouTube -->
             <div class="container">
                 <div class="overflow-hidden">
                    <!--<h5 class="text-light float-left">Alejandro Bullón</h5>-->
                    <span role="button" class="text-light h2 float-right" on="tap:my-lightbox-<?php echo $ID_YouTube; ?>.close">&times;</span>
                  </div>

                  <div class="">
                    <amp-youtube
                    data-videoid="<?php echo $ID_YouTube; ?>"
                    layout="responsive"
                    width="480"
                    height="270"
                    ></amp-youtube>
                  </div>
            </div>

        </div>
    </amp-lightbox>

    <div class="pb-4 text-center">
        <img src="https://img.youtube.com/vi/<?php echo $ID_YouTube; ?>/mqdefault.jpg" class="img-fluid" on="tap:my-lightbox-<?php echo $ID_YouTube; ?>">
    </div> 

<?php }




    $ID_post_actal = get_the_ID();
 
    $dia_nombre_leccion1 = get_post_meta(get_the_ID(), 'dia_nombre_leccion', true);
 
     switch ($dia_nombre_leccion1){
        
        case "Saturday":    
            
            get_videos_de_youtube($ID_post_actal); 
            
            break;
        case "Sunday":
            
            for($i=0;$i<1;$i++){
                
                $ID_post_actal = antiguos_post($ID_post_actal);
                
            }  
            get_videos_de_youtube($ID_post_actal); 
            
            break;
        
        
        
        case "Monday":
            
            for($i=0;$i<2;$i++){
                
                $ID_post_actal = antiguos_post($ID_post_actal);
                
            }
            get_videos_de_youtube($ID_post_actal);  
            
            break;
        case "Tuesday":
            
            for($i=0;$i<3;$i++){
                
                $ID_post_actal = antiguos_post($ID_post_actal);
                
            }
            get_videos_de_youtube($ID_post_actal);  
            
            break;
        case "Wednesday":
                        
            for($i=0;$i<4;$i++){
                
                $ID_post_actal = antiguos_post($ID_post_actal);
                
            }
            get_videos_de_youtube($ID_post_actal); 
            
            break;
        case "Thursday":
                        
            for($i=0;$i<5;$i++){
                
                $ID_post_actal = antiguos_post($ID_post_actal);
                
            } 
            get_videos_de_youtube($ID_post_actal);  
            
            break;
        case "Friday":  
                        
            for($i=0;$i<6;$i++){
                
                $ID_post_actal = antiguos_post($ID_post_actal);
                
            }
            get_videos_de_youtube($ID_post_actal);  
            
            break;
        case "ElSabado":  
                        
            for($i=0;$i<7;$i++){
                
                $ID_post_actal = antiguos_post($ID_post_actal);
                
            }
            get_videos_de_youtube($ID_post_actal);  
            
            break;
    }
 
 
        // Resetear Post Data 
        wp_reset_postdata();  ?> 




<!--//GOOGLE ADSENSE (PC) -->
<?php if(get_option('template_oregoom_adsense_300_600') != ''){ ?>

    <div class="pb-4 mb-4 text-center">

        <?php echo get_option('template_oregoom_adsense_300_600'); ?>

    </div>
<?php } ?>
